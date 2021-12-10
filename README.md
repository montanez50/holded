<h1>PHP API for HOLDED</h1>
<h2>Info</h2>

https://developers.holded.com/reference

https://www.holded.com/


<h2>Install</h2>

composer require vshopes/holded

<h2>Info</h2>


Implemented only parts of the INVOICE API you can use it and improve 

Implemented 
- INVOICE API
    - DOCUMENTS
        - List documents
        - List document
        - Create document
    - SALES CHANNELS
        - List channels sales 
    - PAYMENTS
        - List payments 


<h2>Examples</h2>

<h3>List Documents</h3> 

``` 
<?php 
require_once("vendor/autoload.php");
use Holded\Caller;
use Holded\Document;

$token = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX' //your token

$caller = new Caller ($token);

$document = new Document ($caller);

//docType should be one of: {invoice, salesreceipt, creditnote, salesorder, proform, waybill,estimate, purchase, purchaseorder or purchaserefund}
$docType =  'salesreceipt';

$listdocuments = $document->list(null,$docType);

print_r($listdocuments);

```

<h3>List Document</h3>

```
<?php 
require_once("vendor/autoload.php");
use Holded\Caller;
use Holded\Document;


$caller = new Caller ('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');


$document = new Document ($caller);
$salesreceiptid='XXXXXXXXXXXXXXX';

$listdocuments = $document->list(null, ['salesreceipt',$salesreceiptid ]);

print_r($listdocuments);

```

<h3>Create Document</h3>

```
<?php 
require_once("vendor/autoload.php");
use Holded\Caller;
use Holded\Document;


$caller = new Caller ('XXXXXXXXXXXXXXXXXX');


$document = new Document ($caller);


$docData = [
        'applyContactDefaults' => false,
        'contactCode' =>     '',                                                // (NIF / CIF / VAT)
        'contactName' => 'Pepe Pérez',
        'contactEmail' => 'pepeperez@foo.com',
        'contactAddress' => 'La Pera 12',
        'contactCity' => 'Madrid',
        'contactCp' => '28029',
        'contactProvince'=> 'Madrid',
        'contactCountry'=> 'España',
        'contactCountryCode'=> 'ES',
      //'desc'=> ,
        'date'  => time(),                                                      //int32
        'notes'=> '#0001#34555',
        'salesChannelId'=> 'XXXXXXXXXXXXXXXXXXXX',
        'paymentMethodId'=> 'XXXXXXXXXXXXXXXXXXXX',
      //'designId'=> ,
      //'language'=>,
      //'warehouseId'=>  ,                                                      //Choose the warehouse for your salesorder, purchaseorder or waybill.
        'items'   => [ [                                                        //array of objects
                            'name' => 'Faja compresión',
                            'units' => 1,
                            'sku' => '124135135513',
                            'subtotal' => '34.33',
                            'tax' => '21',
                        ],                                                        
                        [                                                       
                            'name' => 'Plancha ATR',
                            'units' => 2,
                            'sku' => '1241351234513',
                            'subtotal' => '12.11',
//                            'tax' => '',
                        ]                
                    ],                       

      //'customFields'=>,                    // array of objects

      //'invoiceNum'=>,
      //'numSerieId'=>,
        'currency'=>'EUR',
      //'currencyChange'=>,
      //'tags'=>,  //array of strings

      //'dueDate'=>, //int32

      //'shippingAddress'=>,
      //'shippingPostalCode'=>,
      //'shippingCity'=>,
      //'shippingProvince'=>,
      //'shippingCountry'=>,
      //'salesChannel' => '',                   //float
];

//docType should be one of: {invoice, salesreceipt, creditnote, salesorder, proform, waybill,estimate, purchase, purchaseorder or purchaserefund}
$docType =  'salesreceipt';

$response = $document->create(['body' => $docData], $docType );

print_r($response);
```


<h3>Pay Document</h3>

```
<?php 
require_once("vendor/autoload.php");
use Holded\Caller;
use Holded\Document;
use GuzzleHttp\Exception\ClientException;


$caller = new Caller ('XXXXXXXXXXXXXXXXXXXXXXXXXXX');


$document = new Document ($caller);
$invoiceid='SPSPSPSPSPPSPSPS';
	
    
    
 $params=["date"		=>time(),
		'treasury'	=>'TTTTTTTTTTTTTTTTTTTTTTTT'    //stripe
        ];
try {
    $response = $document->pay(['body' => $params],'invoice',$invoiceid,'pay');
} catch (ClientException $e) {
    $response = $e->getResponse()
                    ->getBody()
                    ->getContents();
}

        

print_r($response);	
```


<h3>List Channels Sales</h3>

```
<?php 
require_once("vendor/autoload.php");
use Holded\Caller;
use Holded\SalesChannels;


$caller = new Caller ('XXXXXXXXXXXXXXXXXXXXXX');


$saleschannels = new SalesChannels ($caller);

$listsc = $saleschannels->list();

print_r($listsc);
```

<h3>List Payments</h3>

```
<?php 
require_once("vendor/autoload.php");
use Holded\Caller;
use Holded\Payment;


$caller = new Caller ('XXXXXXXXXXXXXXXXXXXXXXXXX');


$payment = new Payment ($caller);

$listpayments = $payment->list();

print_r($listpayments);
```
<h3>List Treasuries</h3>

```
<?php 
require_once("vendor/autoload.php");
use Holded\Caller;
use Holded\Treasury;


$caller = new Caller ('XXXXXXXXXXXXXXXXXXXXXXXXX');


$treasury = new Treasury ($caller);

$list_treasuries = $treasury->list();

print_r($list_treasuries);
```
<h3>List Funnels</h3>

```
<?php 
require_once("vendor/autoload.php");
use Holded\Caller;
use Holded\Funnel;


$caller = new Caller ('XXXXXXXXXXXXXXXXXXXXXX');


$funnel = new Funnel ($caller);

$funnellist = $funnel->list();

print_r($funnellist);
```
