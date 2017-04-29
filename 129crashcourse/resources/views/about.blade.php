<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
           <div>
               <h1>DorMe.</h1>
                <h2>your dorm. my dorm. our dorm.</h2>
                 <p> Looking for convenience? Look no further. Dorme is here for your new place to dwell!<br />
            Scroll through featured dormitories and apartments on our home page and <br />
            have an easy glimpse into finding your perfect second home!<br />
            Sit back and pick your like.
                  </p>
           </div>

            <div class="content"> <!-- about -->
                <div id="about">
        <p>
            DorMe makes it easy for you to access our website of establishment listings located within the Universtity of the Philippines Miagao campus.
            Whether you're looking for a dormitory, apartment, or boarding house, DorMe offers convenience while you're at home or on-the-go.
            DorMe provides housing information for University of the Philippines Visayas' students in Miagao which is inline with their dyamic lifestyle.  
        </p>
        <h2>♦ Our Team ♦</h2>
        <div id='TEAM' align='center'>
        <div id='team1'>
            <ul>
                <li>
                    <img src="{{URL::asset('/img-uploads/gregg.jpg')}}" alt="Gregg Marionn Icay"/>
                    <li><strong>Gregg Marionn Icay</strong></li>
                    <li>Developer</li><br>
                </li>
                <li>
                    <img src="{{URL::asset('/img-uploads/shebna.jpg')}}" alt="Shebna Rose Fabilloren" />
                    <li><strong>Shebna Rose Fabilloren</strong></li>
                    <li>Developer</li>
                </li>
            </ul>
        </div>
            <div id='team2'>
            <ul>
                <li>
                    <img src="{{URL::asset('/img-uploads/lincy.jpg')}}" alt="Lincy Legada" />
                    <li><strong>Lincy Legada</strong></li>
                    <li>Developer</li><br>
                </li>
                <li>
                    <img src="{{URL::asset('/img-uploads/cyra.jpg')}}" alt="Cyra Dawn Montano" />
                    <li><strong>Cyra Dawn Montano</strong></li>
                    <li>Designer</li>
                </li>
            </ul>
        </div>
    </div>
    </div>
    <div id='contact'>
        <h2>Contact Us</h2>
        <p> Questions? Feedback? Suggestions? <br> We'd love to hear from you!<br>
            Send us an email at <strong><a href=''>support@dorme.com</a></strong> and we'll get back to you as soon as possible.<br>
        </p>
    </div>
    <footer>
        <p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
    </footer>
            </div>
            
    </body>
</html>
