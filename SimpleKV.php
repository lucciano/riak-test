<?php
require __DIR__ . '/vendor/autoload.php';
use Basho\Riak;
use Basho\Riak\Command;
use Basho\Riak\Node;
$node = (new Node\Builder)
    ->atHost('localhost')
    ->onPort(8098)
    ->build();
$riak = new Riak([$node]);

#$user = new \StdClass();
#$user->name = 'John Doe';
#$user->email = 'jdoe@example.com';
#// store a new value
#$command = (new Command\Builder\StoreObject($riak))
#    ->buildJsonObject($user)
#    ->buildBucket('users')
#    ->build();
#$response = $command->execute();
#$location = $response->getLocation();
#
#$command = (new Command\Builder\FetchObject($riak))
#	    ->atLocation($location)
#	        ->build();
#$response = $command->execute();
#$object = $response->getObject();
#$object->getData()->country = 'USA';
#$command = (new Command\Builder\StoreObject($riak))
#	    ->withObject($object)
#	        ->atLocation($location)
#		    ->build();
#$response = $command->execute();
#echo $response->getCode();
################################3
$bucket = new Riak\Bucket('testBucket');

$val1 = 1;
$location1 = new Riak\Location('one', $bucket);

$storeCommand1 = (new Command\Builder\StoreObject($riak))
	->buildObject($val1)
		->atLocation($location1)
			->build();
$storeCommand1->execute();

$val2 = 'two';
$location2 = new Riak\Location('two', $bucket);

$storeCommand2 = (new Command\Builder\StoreObject($riak))
	->buildObject($val2)
		->atLocation($location2)
			->build();
$storeCommand2->execute();

$val3 = ['myValue' => 3];
$location3 = new Riak\Location('three', $bucket);

$storeCommand3 = (new Command\Builder\StoreObject($riak))
	->buildJsonObject($val3)
		->atLocation($location3)
			->build();
$storeCommand3->execute();

#########################################

$response1 = (new Command\Builder\FetchObject($riak))
	->atLocation($location1)
		->build()
			->execute();

$response2 = (new Command\Builder\FetchObject($riak))
	->atLocation($location2)
		->build()
			->execute();

$response3 = (new Command\Builder\FetchObject($riak))
	->atLocation($location3)
		->withDecodeAsAssociative()
			->build()
				->execute();

var_dump($response1->getObject()->getData());
var_dump($response2->getObject()->getData());
var_dump($response3->getObject()->getData());
############################################################
$object3 = $response3->getObject();
$data3 = $object3->getData();

$data3['myValue'] = 42;
$object3 = $object3->setData(json_encode($data3));

$updateCommand = (new Command\Builder\StoreObject($riak))
	    ->withObject($object3)
	        ->atLocation($location3)
		    ->build();

$resp = $updateCommand->execute();

$response3 = (new Command\Builder\FetchObject($riak))
	->atLocation($location3)
		->withDecodeAsAssociative()
			->build()
				->execute();


var_dump($response3->getObject()->getData());

(new Command\Builder\DeleteObject($riak))->atLocation($location1)->build()->execute();
(new Command\Builder\DeleteObject($riak))->atLocation($location2)->build()->execute();
(new Command\Builder\DeleteObject($riak))->atLocation($location3)->build()->execute();
