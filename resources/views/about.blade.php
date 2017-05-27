@extends('layouts.app')

<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../css/style.css') }}" />
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../css/about.css') }}" />
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../bootstrap-3.3.7/dist/css/bootstrap.min.css') }}" />

@section('content')
<div class="body-content"> <!-- about -->
    <div id="about">
        <p>
            DorMe makes it easy for you to access our website of establishment listings located within the Universtity of the Philippines Miagao campus.
            Whether you're looking for a dormitory, apartment, or boarding house, DorMe offers convenience while you're at home or on-the-go.
            DorMe provides housing information for University of the Philippines Visayas' students in Miagao which is inline with their dyamic lifestyle.  
        </p>
        <div id='TEAM'>
            <h2> Our Team </h2>
            <div id='team1'>
                <ul>
                    <li>
                        <img src="{{URL::asset('/img-uploads/gregg.jpg')}}" alt="Gregg Marionn Icay"/>
                        <li><strong>Gregg Marionn Icay</strong></li>
                        <li>Back-end Developer</li><br>
                    </li>
                    <li>
                        <img src="{{URL::asset('/img-uploads/shebna.jpg')}}" alt="Shebna Rose Fabilloren" />
                    <li><strong>Shebna Rose Fabilloren</strong></li>
                        <li>Back-end Developer</li>
                    </li>
                </ul>
            </div>
            <div id='team2'>
                <ul>
                    <li>
                        <img src="{{URL::asset('/img-uploads/lincy.jpg')}}" alt="Lincy Legada" />
                        <li><strong>Lincy Legada</strong></li>
                        <li>Back-end Developer</li><br>
                    </li>
                    <li>
                        <img src="{{URL::asset('/img-uploads/cyra.jpg')}}" alt="Cyra Dawn Montano" />
                        <li><strong>Cyra Dawn Montano</strong></li>
                        <li>Front-end Developer</li>
                    </li>
                </ul>
            </div>
        </div>
    </div>
   
</div>
 <div id="contacthome2">
    <h3>Contact Us</h3>
        <p> Questions? Feedback? Suggestions? <br> We'd love to hear from you!<br><br>
            Reach out to our team or get in touch with our customer service and we'll get back to you as soon as possible.<br>
            <hr/>
        </p>
        <img src="../img-uploads/contact.jpg" alt="Corporate Headquarters" />
</div>

<footer>
    <p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
</footer>
            
@endsection
