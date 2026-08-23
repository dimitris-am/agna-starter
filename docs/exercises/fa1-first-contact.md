# FA1 — First Contact

*Day 1, Block A — right after the cold open, on your own laptop.*

## Goal

Get comfortable asking Claude Code about code you didn't write, then use it to find and fix a real discount bug in `agna-starter` — test first, fix second.

## Steps

1. Open a terminal in your `agna-starter` checkout and start Claude Code: `claude`.
2. Ask it: **"explain this codebase to me"**. Read the answer before moving on — don't just skim for a file list.
3. Ask: **"where are partner discounts computed?"**. It should land you in `app/Services/DiscountService.php`.
4. Read `rateFor()`'s docblock: 3% under 500 units, 7% from 500–999, 12% from 1,000 up. Ask Claude to check whether the code matches that comment exactly at the 1,000-unit boundary.
5. Before touching any code, ask Claude to write a failing test that proves what happens at exactly 1,000 units. Run it and watch it fail.
6. Ask Claude to fix `DiscountService` so the test passes, then re-run.

## Done when

The new test passes, and a partner ordering exactly 1,000 units gets the 12% rate.

## Stretch

`InvoiceTotals` has no tests yet. Pick one thing it calculates and ask Claude to add a test for it.
