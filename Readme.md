#ECKCS normalizer en deserializer
Deze library geeft de mogelijkheid om op via een standaard interface XML documenten die volgens de ECKCatalogService standaard zijn opgesteld te deserializeren en te gebruiken in een php applicatie.

###Links
- XSD's behorende bij de ECK standaard: https://xsd.kennisnet.nl/eck/
- Informatie over de werkgroep ECK Distributie en toegang: https://www.edustandaard.nl/standaard_werkgroepen/werkgroep-educatieve-distributie-en-toegang/
- Informatie over de geimplementeerde standaard: https://www.edustandaard.nl/standaard_afspraken/eck-distributie-en-toegang/eck-distributie-en-toegang-2-3/

### Voorbeeld
```php
$document   = file_get_contents(...);
$normalizer = new Kennisnet\ECK\RecordsNormalizer();

$deserializedRecords = $normalizer->deserializeFromSearchResponse($document);
$records = $normalizer->normalize($deserializedRecords, Kennisnet\ECK\EckRecordSchemaTypes::ECKCS_2_3);
```

###Andere projecten
- https://github.com/kennisnet/phpEdurepSearch (geeft een standaard interface voor het zoeken in de CatalogService)

###Ondersteuning
- Dit project ondersteund op dit moment alleen de standaard ECKCS 2.3, eerdere standaarden worden niet ondersteund, nieuwere mogelijk via backwards-compatibility.
- Heb je vragen over het gebruik of implementatie van de standaard, neem dan contact op met: info@edustandaard.nl
