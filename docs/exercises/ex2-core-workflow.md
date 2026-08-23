# EX2 — Core Workflow

*Day 1, Block B.*

## Goal

Practice the loop you just watched: `/init`, plan mode, read before you approve, read before you commit. You'll ship one small, real feature on `agna-starter`.

## Steps

1. In your `agna-starter` checkout, run `/init` inside Claude Code. It reads the repo and writes a starter `CLAUDE.md`.
2. Read what it wrote. Add two conventions of your own that are true about this codebase but not yet written down. Two real candidates, if you want a starting point: how money is stored (check any migration — columns ending in `_cents`), and where tests live (there's a `tests/Feature`, no `tests/Unit`).
3. Switch to plan mode. Ask Claude: "Add a late-deliveries filter to /orders. A delivery is late when its `scheduled_for` date is in the past and `delivered_at` is still empty."
4. Read the plan before approving it. If it's vague about where the filter lives or exactly how "late" gets checked, send it back and say so.
5. Once it builds the feature, read the diff — every file it touched, not just the summary.
6. Test it by hand: open `/orders`, apply the filter, confirm only genuinely late orders show up.
7. Commit. One commit for this exercise.

## Done when

The filter works on `/orders`, and your work is a single commit.

## Stretch

Make the late filter combine with the existing partner and status filters, so you can answer "which of this partner's open orders are late?" in one pass.
