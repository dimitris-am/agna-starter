# agna-orders

Internal orders tracker for the distribution team. Replaces the old Excel
sheet that used to get emailed around every Monday morning. It only covers
what the Tirana warehouse needs day to day: looking up orders, checking
delivery status, and pulling up an invoice when someone in accounts needs
to double check a partner's numbers.

This was put together fast during the Q2 push a couple of years back and
nobody's had time to circle back and clean it up since. The plan was to
add a proper admin panel and hook it into the accounting export once
things settled down, but that's been "next quarter" for a while now — so
for the moment this is still just the read-only pages, ask in the office
if you need something changed directly in the database.

## Setup

```
composer install
php artisan serve
```

Needs a MySQL connection configured in `.env` — ask for the credentials to
the shared dev box if you don't have them. Point of sale data comes in
through the nightly import job on the old system; if the numbers look
stale, that job has probably failed again, check the cron log on the dev
box before poking at anything here.
