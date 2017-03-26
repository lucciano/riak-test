# riak-test
Riak Simple Test

from http://docs.basho.com/riak/kv/2.2.1/developing/getting-started/php/querying/

CREATE TABLE GeoCheckin ( region VARCHAR NOT NULL, state VARCHAR   NOT NULL, time TIMESTAMP NOT NULL, weather VARCHAR NOT NULL, temperature  DOUBLE, PRIMARY KEY ( (region, state, QUANTUM(time, 15, 'm')), region, state, time));

INSERT INTO GeoCheckin (region, state, time, weather, temperature) VALUES ('Arg', 'SF', 1451606401, 'hot', 23.5);
INSERT INTO GeoCheckin (region, state, time, weather, temperature) VALUES ('Arg', 'SF', 1451606901, 'hot', 23.5);
INSERT INTO GeoCheckin (region, state, time, weather, temperature) VALUES ('Arg', 'SF', 1451607401, 'hot', 23.5);
INSERT INTO GeoCheckin (region, state, time, weather, temperature) VALUES ('Arg', 'SF', 1451607901, 'hot', 23.5);
INSERT INTO GeoCheckin (region, state, time, weather, temperature) VALUES ('Arg', 'SF', 1451608401, 'hot', 23.5);
INSERT INTO GeoCheckin (region, state, time, weather, temperature) VALUES ('Arg', 'SF', 1451608901, 'hot', 23.5);
INSERT INTO GeoCheckin (region, state, time, weather, temperature) VALUES ('Arg', 'SF', 1451609401, 'hot', 23.5);
INSERT INTO GeoCheckin (region, state, time, weather, temperature) VALUES ('Arg', 'SF', 1451609901, 'hot', 23.5);
