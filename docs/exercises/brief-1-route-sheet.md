# Route day sheet

## Goal

Given `deliveries.csv` (columns: route_code, partner, point_of_sale, city, crates), produce a printable page per route for tomorrow's drivers: stops in order, crate total per route. Order means the order stops appear in the CSV for that route — no map, no optimizing, just a clean page a driver can glance at before leaving the warehouse.

## Sample input: `deliveries.csv`

```csv
route_code,partner,point_of_sale,city,crates
R1,Vjosa Snacks Shpk,Market Ada,Tirana,12
R1,Dajti Market Shpk,Mini Market Besa,Tirana,8
R1,Osumi Distribution Shpk,Superette Liria,Durrës,5
R2,Shkumbini Trading Shpk,Local Shop Iliria,Durrës,15
R2,Vjosa Snacks Shpk,Market Drini,Vlorë,6
```

## Done when

Loading the sample above renders two route pages:

- **R1** — 3 stops in CSV order (Market Ada, Mini Market Besa, Superette Liria), crate total **25**.
- **R2** — 2 stops in CSV order (Local Shop Iliria, Market Drini), crate total **21**.

## Stretch

Add a totals-per-city summary: Tirana 20, Durrës 20, Vlorë 6. Durrës is the interesting one — it gets crates from both routes, so the city total has to add across R1 and R2, not just re-show a route total.
