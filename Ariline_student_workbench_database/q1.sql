USE work_bench_database;

SELECT ct.customer_id,ct.first_name,ct.last_name 
FROM customer_table as ct 
INNER JOIN booking_table as bt ON bt.customer_id=ct.customer_id
INNER JOIN booking_line_table as blt ON blt.reservation_id=bt.reservation_id
INNER JOIN flight_table as ft ON ft.flight_id=blt.flight_id
INNER JOIN airport_table as at ON at.airport_code=ft.departure_airport_code
WHERE at.airport_name='Rockhampton Airport';
