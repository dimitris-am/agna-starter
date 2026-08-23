# Stock-count helper

## Goal

A form to enter counted units per product against expected units; result page shows variance per product and flags anything off by more than 5%. This is the tool a warehouse clerk runs right after a physical count, to see which products need a second look before the numbers go into the system.

## Sample input: expected units

```csv
product,expected_units
Vjosa Water 0.5L,240
Dukagjini Cheese 400g,60
Adriatik Cola 1L,150
Tomorri Snacks 150g,300
Shkumbini Juice 1L,100
```

## Done when

Entering these five counted values flags exactly two products:

| Product | Expected | Counted | Variance | Flagged? |
|---|---|---|---|---|
| Vjosa Water 0.5L | 240 | 240 | 0.00% | no |
| Dukagjini Cheese 400g | 60 | 58 | -3.33% | no |
| Adriatik Cola 1L | 150 | 130 | -13.33% | **yes** |
| Tomorri Snacks 150g | 300 | 300 | 0.00% | no |
| Shkumbini Juice 1L | 100 | 118 | +18.00% | **yes** |

Only Adriatik Cola 1L and Shkumbini Juice 1L should be flagged.

## Stretch

Add a CSV export of the variance table above.
