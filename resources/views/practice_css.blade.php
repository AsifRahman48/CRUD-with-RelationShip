<!DOCTYPE html>
<html>
<title>CSS</title>
<head>
    <style>
        .overflow{
            background: coral;
            width: 300px;
            height: 50px;
            overflow: auto;
        }

        h2:hover{
            background-color: coral;
        }
        .hover,h2 {
            color: #f2f2f2 ;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {background-color: #f2f2f2;}
        tr:hover {
            background-color: coral;
        }
        th {
            background-color: #1c6e37;
            color: white;
        }
        .position {
            position: absolute;
            left: 0;
            top: 0;
            z-index: -1;
            width: 100%;
            height: 300px;
        }
        .chunk:hover {
            background-color: coral;
        }
        .float_img {
            width: 170px;
            height: 170px;
            float:left;
            margin-right: 15px;
        }
        .none{
            display: none;
            background: yellow;
            padding: 20px;
        }
        .p:hover .none{
           display: block;
        }


        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        a:link{
            text-decoration: none;
        }

        ul li:nth-child(n) {background-color: #f2f2f2; color: white; width: 25%}
        li:nth-child(1) {background-color: green; width: 25%}

    </style>
</head>
<body>

<h2>Hoverable Table</h2>

<p class="hover">Move the mouse over the table rows to see the effect.</p>

<img class="position" src="{{ asset('1675942902.jpg') }}" />

<div style="overflow-x: auto;">
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Points</th>
            <th>Points</th>
            <th>Points</th>
            <th>Points</th>
            <th>Points</th>
            <th>Points</th>
            <th>Points</th>
            <th>Points</th>
            <th>Points</th>
            <th>Points</th>
        </tr>
        <tr>
            <td>Jill</td>
            <td>Smith</td>
            <td>50</td>
            <td>50</td>
            <td>50</td>
            <td>50</td>
            <td>50</td>
            <td>50</td>
            <td>50</td>
            <td>50</td>
            <td>50</td>
            <td>50</td>
        </tr>
        <tr>
            <td>Eve</td>
            <td>Jackson</td>
            <td>94</td>
            <td>94</td>
            <td>94</td>
            <td>94</td>
            <td>94</td>
            <td>94</td>
            <td>94</td>
            <td>94</td>
            <td>94</td>
            <td>94</td>
        </tr>
        <tr>
            <td>Adam</td>
            <td>Johnson</td>
            <td>67</td>
            <td>67</td>
            <td>67</td>
            <td>67</td>
            <td>67</td>
            <td>67</td>
            <td>67</td>
            <td>67</td>
            <td>67</td>
            <td>67</td>
        </tr>
    </table>
</div>

<?php
$long_string =123456789123456789;

$chunks = chunk_split($long_string,2);
?>
<p class="chunk" style="color: white"> {{ $chunks }}</p>
<br><br>
<div class="overflow">You can use the overflow property when you want to have better control of the layout.
    The overflow property specifies what happens if content overflows an element's box.</div>

<h3>Float Right</h3>

<p class="float">In this example, the image will float to the right in the paragraph, and the text in the paragraph will wrap around the image.</p>

<p class="float" style="font-size: 20px"><img class="float_img" src="{{ asset('1675942902.jpg') }}" alt="" >
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas odio, vitae scelerisque enim ligula venenatis dolor.
    Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Mauris ante ligula, facilisis sed ornare eu, lobortis in odio. Praesent convallis urna a lacus interdum ut hendrerit risus congue.
    Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis.
    Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta. Cras ac leo purus. Mauris quis diam velit.</p>

<div class="p">Hover over this div element to show the p element
    <p class="none">Tada! Here I am!</p>
</div>

<p>In this example, we remove the bullets from the list, and its default padding and margin.</p>

    <ul>
        <li><a class="a" href="#home">Home</a></li>
        <li><a class="b" href="#news">News</a></li>
        <li><a class="c" href="#contact">Contact</a></li>
        <li><a class="d" href="#about">About</a></li>
    </ul>


</body>
</html>


