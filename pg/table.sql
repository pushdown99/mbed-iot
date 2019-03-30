create table cushion (
  uuid       varchar(16),
  ts         timestamp,
  ch0        int,
  ch1        int,
  ch2        int,
  ch3        int,
  ch4        int,
  ch5        int,
  ch6        int,
  ch7        int,
  ch8        int,
  ch9        int,
  ch10       int,
  ch11       int,
  ch12       int,
  ch13       int,
  ch14       int,
  ch15       int,
  ch16       int,
  ch17       int,
  ch18       int,
  ch19       int,
  ch20       int,
  ch21       int,
  ch22       int,
  ch23       int,
  ch24       int,
  ch25       int,
  ch26       int,
  ch27       int,
  ch28       int,
  ch29       int,
  ch30       int,
  _max       int,
  _sum       int,
  _avg       int,
  _detect    int,
  _stddev    int,
  _front     int,
  _middle    int,
  _rear      int,
  _right     int,
  _center    int,
  _left      int,
  primary key (uuid, ts)
);

create table history (
  uuid       varchar(16),
  ts         timestamp,
  code       smallint,
  message    varchar(128)
)
