SELECT 
alc.air_line_code,blt.reservation_id,ft.fight_no,at_dep.airport_code as departure,at_arv.airport_code as arival,ft.flght_date
FROM flight_table as ft
INNER JOIN air_line_table as alc ON ft.fight_no=alc.air_line_code
INNER JOIN airport_table as at_dep ON at_dep.airport_code=ft.departure_airport_code
INNER JOIN airport_table as at_arv ON at_arv.airport_code=ft.arrival_airport_code
INNER JOIN booking_line_table as blt ON blt.flight_id=ft.flight_id
