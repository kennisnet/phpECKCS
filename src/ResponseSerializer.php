<?php


namespace Kennisnet\ECK;

use DOMNode;

class ResponseSerializer
{
    /**
     * @param string $response
     *
     * @return array<string,mixed>
     */
    public function deserialize(string $response): array
    {
        $xpath = (new EckDomDocument($response))->xpath;

        $data = [];
        if (!$records = $xpath->query('//srw:records/srw:record')) {
            return $data;
        }

        foreach ($records as $record) {
            $recordId = trim($xpath->evaluate("string(./srw:recordIdentifier/text()[1])", $record));
            $nodeList = $xpath->evaluate("./srw:recordData", $record);
            if ($nodeList && $nodeList->length) {
                $recordData = $this->serializeToArray($nodeList->item(0));
                if ($recordData && $recordData['recordData']) {
                    $data[$recordId] = $recordData['recordData'];
                }
            }
        }

        return $data;
    }

    function serializeToArray(DOMNode $element, &$recordData = [], int $level = 0
    ): ?array {
        $level++;
        //list attributes
        if ($element->attributes !== null && is_array($recordData)) {
            foreach ($element->attributes as $attribute) {
                if (isset($recordData['_attributes'][$attribute->name])) {
                    if (is_string($recordData['_attributes'][$attribute->name])) {
                        $recordData['_attributes'][$attribute->name] = [
                            $recordData['_attributes'][$attribute->name],
                            $attribute->value
                        ];
                    } else {
                        if (is_array($recordData['_attributes'][$attribute->name])) {
                            $recordData['_attributes'][$attribute->name][] = $attribute->value;
                        } else {
                            $recordData['_attributes'][$attribute->name] = $attribute->value;
                        }
                    }
                } else {
                    $recordData['_attributes'][$attribute->name] = $attribute->value;
                }
            }
        }
        $prefix = $element->prefix;

        //handle classic node
        if ($element->nodeType == XML_ELEMENT_NODE) {
            // Remove the xml ns prefix if part of current nodeName
            $key = str_replace($prefix . ':', '', $element->nodeName);
            // Iterates recursive to all children and pass the $recordData with reference
            if ($element->hasChildNodes()) {
                $children = $element->childNodes;
                for ($i = 0; $i < $children->length; $i++) {
                    if ($children->item($i) !== null) {
                        $this->serializeToArray($children->item($i), $recordData[$key], $level);
                    }
                }
            }
            // This is de edge of the nodes tree. Here the values will be handled
        } else {
            if ($element->nodeType == XML_TEXT_NODE || $element->nodeType == XML_CDATA_SECTION_NODE) {
                // Remove empty strings including newlines and whitespaces
                $value = trim($element->nodeValue);
                if (!empty($value)) {
                    // Is array && not equal the current value as set before, convert it to an array.
                    if (is_string($recordData)) {
                        $recordData = [$recordData, $value];
                    } else {
                        if (is_array($recordData)) {
                            $recordData[] = $value;
                        } else {
                            $recordData = $value;
                        }
                    }
                }
            }
        }
        if ($level == 1) {
            return $recordData;
        }

        return null;
    }


}
