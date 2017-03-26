FROM debian:8
RUN apt-get update && apt-get install -yq wget 
RUN wget http://s3.amazonaws.com/downloads.basho.com/riak_ts/1.5/1.5.2/debian/jessie/riak-ts_1.5.2-1_amd64.deb
RUN apt-get install -yq logrotate
RUN apt-get install -yq sudo
RUN dpkg -i riak-ts_1.5.2-1_amd64.deb

RUN apt-get install -yq vim net-tools

EXPOSE 8087
EXPOSE 8098
