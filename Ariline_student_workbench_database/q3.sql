SELECT
ct.first_name,ct.last_name,blt.reservation_id,ft.flght_date,ft.fight_no,bt.total_price
FROM flight_table as ft 
INNER JOIN booking_line_table as blt ON blt.flight_id=ft.flight_id
INNER JOIN booking_table as bt ON bt.reservation_id=blt.reservation_id
INNER JOIN customer_table as ct ON ct.customer_id=bt.customer_id