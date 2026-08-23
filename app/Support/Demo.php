<?php

namespace App\Support;

/**
 * Fixture data shared by the model factories and the database seeders,
 * so the demo dataset stays consistent no matter which one is used.
 */
class Demo
{
    /**
     * Albanian cities where AGNA has partners and points of sale.
     *
     * @var array<int, string>
     */
    public const CITIES = [
        'Tirana',
        'Durrës',
        'Vlorë',
        'Shkodër',
        'Elbasan',
        'Fier',
        'Korçë',
        'Berat',
        'Lushnjë',
        'Kavajë',
        'Pogradec',
        'Gjirokastër',
        'Sarandë',
        'Kukës',
        'Lezhë',
        'Krujë',
        'Peshkopi',
        'Patos',
        'Burrel',
        'Përmet',
    ];

    /**
     * Fictional FMCG brand names distributed by AGNA.
     *
     * @var array<int, string>
     */
    public const BRANDS = [
        'Dukagjini Foods',
        'Adriatik Beverages',
        'Malësia Dairy',
        'Tomorri Snacks',
        'Vjosa Waters',
        'Drinos Bakery',
        'Ilira Confections',
        'Buna Provisions',
        'Osumi Oils',
        'Shpirag Foods',
        'Lura Dairy',
        'Krrabë Beverages',
    ];

    /**
     * Surnames used to build fictional partner (customer) business names.
     *
     * @var array<int, string>
     */
    public const PARTNER_SURNAMES = [
        'Krasniqi',
        'Berisha',
        'Hoxha',
        'Shehu',
        'Gashi',
        'Dervishi',
        'Ismaili',
        'Kastrati',
        'Zeneli',
        'Tafa',
        'Bushati',
        'Prifti',
        'Duka',
        'Balla',
        'Lika',
        'Musaj',
        'Ndoja',
        'Vata',
        'Brahimi',
        'Sula',
    ];

    /**
     * Business-type words used to build fictional partner names.
     *
     * @var array<int, string>
     */
    public const PARTNER_WORDS = [
        'Tregtim',
        'Shpërndarje',
        'Impex',
        'Komerc',
        'Import-Eksport',
        'Grup Tregtar',
    ];

    /**
     * Point-of-sale outlet types.
     *
     * @var array<int, string>
     */
    public const POS_TYPES = [
        'Market',
        'Minimarket',
        'Superstore',
        'Dyqan Ushqimor',
        'Qendra Tregtare',
    ];

    /**
     * Point-of-sale area/branch qualifiers.
     *
     * @var array<int, string>
     */
    public const POS_AREAS = [
        'Qendër',
        'Periferi',
        'Autostrada',
        'Rruga Kryesore',
        'Lagjja 1',
        'Lagjja 2',
        'Zona Industriale',
    ];

    /**
     * Delivery route codes used by the AGNA fleet.
     *
     * @var array<int, string>
     */
    public const ROUTE_CODES = [
        'RT-01',
        'RT-02',
        'RT-03',
        'RT-04',
        'RT-05',
        'RT-06',
        'RT-07',
        'RT-08',
    ];
}
