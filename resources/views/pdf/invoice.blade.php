<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>
        @page {
            size: 8.5in 11in;
            margin: 0.1in;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: none;
            box-shadow: none;
            font-size: 12px;
            line-height: 20px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: black;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 35px;
            color: black;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            font-size: 10px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            font-weight: bold;
            text-align: center;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: none;
            text-align: center;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            font-weight: bold;
        }

        .invoice-box table tr.final {
            border-top: 2px solid black;
        }

        @media only screen and (max-width: 700px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: 'Times New Roman', Times, serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }


    </style>
</head>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="9">
                <table>
                    <tr>
                        <td class="title">
                            <img
                                src="assets/img/logo-new.jpg"
                                style="width: 70%; max-width: 80px"
                            />
                        </td>

                        <td>
                            KOŠAR, Darko Stojanovski s.p. <br />
                            {{ $company->address }}<br />
                            ID št. za DDV SI63434989<br />
                            Tel. {{ $company->phone }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="9">
                <table>
                    <tr>
                        <td>
                            <strong>NORMALA, GOSTINSTVO, D.O.O.</strong><br />
                            MAISTROVA ULICA 8<br />
                            1000 LJUBLJANA
                        </td>

                        <td>
                            <strong><u>Račun številka: 23-0566</u></strong><br />
                            Ljubljana, 28.08.2023<br />
                            Datum zapadlosti: 01.09.2023<br />
                            Datum opr. storitve: 26.08.2023<br />
                            Veza na dobavnico: 2023-00535<br />
                            Način plačila: nakazilo na TR<br />
                            TRR: SI56 0313 4100 0511 918<br />
                            Sklic: 00 23-0566
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td style="text-align: left">Poz</td>
            <td>Sifra</td>
            <td>Vrsta Blaga-storitev</td>
            <td>Kol.</td>
            <td>Cena brez DDV</td>
            <td>R %</td>
            <td>Cena s popustom</td>
            <td>DDV%</td>
            <td style="text-align: right">Vrednost brez DDV</td>
        </tr>

        <tr class="item">
            <td style="text-align: left">1</td>
            <td>123456</td>
            <td>Website design</td>
            <td>2 pcs</td>
            <td>$20.00</td>
            <td>0%</td>
            <td>22$</td>
            <td>$40.00</td>
            <td style="text-align: right">$300.00</td>
        </tr>
        <tr class="item">
            <td style="text-align: left">1</td>
            <td>123456</td>
            <td>Website design</td>
            <td>2 pcs</td>
            <td>$20.00</td>
            <td>0%</td>
            <td>22$</td>
            <td>$40.00</td>
            <td style="text-align: right">$300.00</td>
        </tr>
        <tr class="item">
            <td style="text-align: left">1</td>
            <td>123456</td>
            <td>Website design</td>
            <td>2 pcs</td>
            <td>$20.00</td>
            <td>0%</td>
            <td>22$</td>
            <td>$40.00</td>
            <td style="text-align: right">$300.00</td>
        </tr>
        <tr class="item">
            <td style="text-align: left">1</td>
            <td>123456</td>
            <td>Website design</td>
            <td>2 pcs</td>
            <td>$20.00</td>
            <td>0%</td>
            <td>22$</td>
            <td>$40.00</td>
            <td style="text-align: right">$300.00</td>
        </tr>
        <tr class="final">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            <td></td>
            <td style="text-align: right">Znesek brez popusta: </td>

            <td style="text-align: right"> $385.00</td>
        </tr>
        <tr class="total">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            <td></td>
            <td style="text-align: right">Popust: </td>

            <td style="text-align: right"> $385.00</td>
        </tr>
        <tr class="total">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            <td></td>
            <td style="text-align: right">Skupaj vrednost brez DDV: </td>

            <td style="text-align: right"> $385.00</td>
        </tr>
        <tr class="total">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            <td></td>
            <td style="text-align: right">Osnova 22%:  </td>

            <td style="text-align: right"> $385.00</td>
        </tr>
        <tr class="total">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            <td></td>
            <td style="text-align: right">DDV 22%:  </td>

            <td style="text-align: right"> $385.00</td>
        </tr>
        <tr class="total">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            <td></td>
            <td style="text-align: right">Za plačilo EUR:</td>

            <td style="text-align: right"> $385.00</td>
        </tr>
    </table>
    <p>Računalniško izdelan račun velja brez podpisa in žiga</p>
    <p>Reklamacije sprejemamo v roku 8 dni od dneva izstavitve računa.<br> V primeru neplačila lahko zaračunavamo zakonsko določene zamudne obresti</p>
    <p>Izjavljamo, da smo vključeni v sistem ravnanja z odpadno embalažo ter izpolnjujemo proizvajalčeve razširjene odgovornosti za odpadno
        embalažo.</p>
</div>
</body>
</html>
