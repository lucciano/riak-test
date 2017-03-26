# riak-test
Riak Simple Test

from http://docs.basho.com/riak/kv/2.2.1/developing/getting-started/php/querying/

CREATE TABLE GeoCheckin ( region VARCHAR NOT NULL, state VARCHAR   NOT NULL, time TIMESTAMP NOT NULL, weather VARCHAR NOT NULL, temperature  DOUBLE, PRIMARY KEY ( (region, state, QUANTUM(time, 15, 'm')), region, state, time));
