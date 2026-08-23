# Price-list diff

## Goal

Given `prices-old.csv` and `prices-new.csv` (sku, name, unit_price_cents), show changed rows with old → new and percent change, biggest first. Rows where the price didn't move should not appear in the output at all — this is a change report, not a full catalog dump.

## Sample input

`prices-old.csv`:

```csv
sku,name,unit_price_cents
SKU-101,Vjosa Water 0.5L,80
SKU-102,Dukagjini Cheese 400g,450
SKU-103,Adriatik Cola 1L,150
SKU-104,Tomorri Snacks 150g,120
SKU-105,Shkumbini Juice 1L,90
```

`prices-new.csv`:

```csv
sku,name,unit_price_cents
SKU-101,Vjosa Water 0.5L,95
SKU-102,Dukagjini Cheese 400g,450
SKU-103,Adriatik Cola 1L,138
SKU-104,Tomorri Snacks 150g,120
SKU-105,Shkumbini Juice 1L,90
```

## Done when

Loading the sample above shows exactly two rows, biggest change first:

1. **SKU-101** Vjosa Water 0.5L — 80 → 95 cents (+18.75%)
2. **SKU-103** Adriatik Cola 1L — 150 → 138 cents (-8.00%)

SKU-102, SKU-104, and SKU-105 are unchanged and do not appear.

## Stretch

Flag changes over 10%: SKU-101 (+18.75%) gets flagged, SKU-103 (-8.00%) does not.
