<!doctype html>
<html>
<head>
    @include('shared.head')
    @yield('css')
    <style>
        body {
            padding-top: 50px;
        }

        /* Space out content a bit */
        body {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        /* Everything but the jumbotron gets side spacing for mobile first views */
        .header,
        .marketing,
        .footer {
            padding-right: 15px;
            padding-left: 15px;
        }

        /* Custom page header */
        .header {
            padding-bottom: 20px;
            border-bottom: 1px solid #e5e5e5;
        }

        /* Make the masthead heading the same height as the navigation */
        .header h3 {
            margin-top: 0;
            margin-bottom: 0;
            line-height: 40px;
        }

        /* Custom page footer */
        .footer {
            padding-top: 19px;
            color: #777;
            border-top: 1px solid #e5e5e5;
        }

        /* Customize container */
        @media (min-width: 768px) {
            .container {
                max-width: 730px;
            }
        }

        .container-narrow > hr {
            margin: 30px 0;
        }

        /* Main marketing message and sign up button */
        .jumbotron {
            text-align: center;
            border-bottom: 1px solid #e5e5e5;
        }

        .jumbotron .btn {
            padding: 14px 24px;
            font-size: 21px;
        }

        /* Supporting marketing content */
        .marketing {
            margin: 40px 0;
        }

        .marketing p + h4 {
            margin-top: 28px;
        }

        /* Responsive: Portrait tablets and up */
        @media screen and (min-width: 768px) {
            /* Remove the padding we set earlier */
            .header,
            .marketing,
            .footer {
                padding-right: 0;
                padding-left: 0;
            }

            /* Space out the masthead */
            .header {
                margin-bottom: 30px;
            }

            /* Remove the bottom border on the jumbotron for visual effect */
            .jumbotron {
                border-bottom: 0;
            }
        }

    </style>
</head>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/gishwhes">Gishwhes!</a>
        </div>
    </div>
</nav>


<div class="jumbotron">
    <h1 id="mascot-name"></h1>

    <p class="lead" id="description"></p>

    <p><a class="btn btn-lg btn-info" href="#" role="button" id="generate">Generate another mascot!</a></p>
</div>

<script type="application/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="application/javascript"
        src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
    var list = [
        ["wom", "bat", "wombat"],
        ["ele", "phant", "elephant"],
        ["dino", "saur", "dinosaur"],
        ["octo", "pus", "octopus"],
        ["ot", "ter", "otter"],
        ["buf", "falo", "buffalo"],
        ["kanga","roo","kangaroo"],
        ["butter","fly","butterfly"],
        ["tur","key","turkey"],
        ["peng","guin","penguin"],
        ["jag","guar","jaguar"],
        ["mon","goose","mongoose"],
        ["liz","ard","lizard"],
        ["mon","key","monkey"],
        ["tort","oise","tortoise"],
        ["ze","bra","zebra"]
    ]
    $('#generate').on('click', generate);
    function generate() {
        var first, second;
        do {
            first = list[Math.floor(Math.random() * list.length)];
            second = list[Math.floor(Math.random() * list.length)];
        } while (first === second);


        var name = first[0] + second[1];
        var description = "Part " + first[2] + ", part " + second[2];

        $("#mascot-name").text(name);
        $("#description").text(description);
    }
    generate();
</script>