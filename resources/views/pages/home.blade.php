@extends('layouts.default')
@section('css')
    <style>
        .name {
            font-size:56px;
        }
        .center {
            text-align: center;
        }
        .content-section {
            padding-top:40px;
        }
        .section-header {
            font-size: 40px;
            display:table;
            margin:0 auto;
        }
        .job {
            padding-left:15px;
            padding-top: 30px;
            width:80%;
        }
        .title .employer .dates .info {
            padding: 10px;
        }

        .title {
            font-size: 24px;
        }

        .employer {
            font-size: 18px;
        }

        .info {
            padding-left: 20px;
        }

        ul
        {
            list-style-type: none;
        }
    </style>
@stop

@section('content')
    <h1 class="name center">Kyle McGrogan</h1>

    <div class="content-section">
        <span class="section-header">Work Experience
            <a class="btn btn-sm btn-default center" role="button" data-toggle="collapse" href="#work" aria-expanded="true" aria-controls="work">
                Hide/Show
            </a>
        </span>
        <br/>
        <div id="work" class="collapse in">

            <div class="job">
                <div class="title">Web Developer</div>
                <div class="employer">d'Vinci Interactive</div>
                <div class="dates">
                    October 2014 - Current
                </div>
                <div class="info">
                    Developing PHP solutions to satisfy client needs, including client API interactions.
                </div>
            </div>

            <div class="job">
                <div class="title">Software Developer</div>
                <div class="employer">Versatile Systems, Inc</div>
                <div class="dates">
                    February 2014 - October 2014
                </div>
                <div class="info">
                    Worked with JavaEE, CSS3, HTML5, AngularJS, NodeJS, and plenty of other technologies to
                    provide kiosk software that interacts with lender api's, and are located in thousands
                    of stores nationwide so that they can generate in-store credit approvals to assist sales growth.
                </div>
            </div>

            <div class="job">
                <div class="title">Programmer/Analyst I</div>
                <div class="employer">Global Data Consultants</div>
                <div class="dates">
                    September 2013 - February 2014
                </div>
                <div class="info">
                    Worked with .NET languages as well as the IBM MQ system to provide consulting solutions.
                    Most of the development was focused on a Windows service that connected two systems,
                    converting multiple client connections into a single database connection.
                </div>
            </div>

            <div class="job">
                <div class="title">Programmer/Analyst I</div>
                <div class="employer">Benecard PBF</div>
                <div class="dates">
                    February 2013 - September 2013
                </div>
                <div class="info">
                    Implemented mission­-critical functionality in a large in-house J2EE project, including both frontend
                    JSP/JSF technologies and backend Enterprise Beans.
                    <br/>
                    Assisted the core project developer of the VuFind Integrated Library System (ILS) in
                    bugfixes and feature progression. Contributed to several enterprise-scale components
                    in an effort to improve flexibility and security.
                </div>
            </div>

            <div class="job">
                <div class="title">Student Developer</div>
                <div class="employer">Keystone Library Network</div>
                <div class="dates">
                    September 2011 - May 2013
                </div>
                <div class="info">
                    Assisted the core project developer of the VuFind Integrated Library System (ILS) in bugfixes and
                    feature progression. Contributed to several enterprise-scale components in an effort to
                    improve flexibility and security.
                </div>
            </div>
        </div>
    </div>

    <div class="content-section">
        <span class="section-header">Skills
            <a class="btn btn-sm btn-default" role="button" data-toggle="collapse" href="#skills" aria-expanded="true" aria-controls="skills">
                Hide/Show
            </a>
        </span>
        <br/>
        <div id="skills" class="collapse in">
            <ul>
                <li>
                    <span class="title">Languages/Markup:</span>
                    <ul>
                        <li>PHP (Zend 2, CodeIgniter, Laravel)</li>
                        <li>Javascript (jQuery, AngularJS, nodeJS)</li>
                        <li>MySQL</li>
                        <li>PostgreSQL</li>
                        <li>Java EE</li>
                        <li>.NET</li>
                        <li>HTML5</li>
                        <li>CSS3</li>
                        <li>XML</li>
                        <li>XML</li>
                        <li>Apache Velocity</li>
                        <li>Apache ANT Including Apache Ivy</li>
                        <li>Java ServerPages</li>
                        <li>PrimeFaces</li>
                        <li>Java Spring Framework</li>
                    </ul>
                </li>
                <li>
                    <span class="title">Operating Systems:</span>
                    <ul>
                        <li>Most Windows Operating Systems</li>
                        <li>Red Hat Linux</li>
                        <li>Mac OS X Mavericks 10.9</li>
                    </ul>
                </li>
                <li>
                    <span class="title">Applications/Other:</span>
                    <ul>
                        <li>Eclipse IDE ( + Spring Tool Suite)</li>
                        <li>Visual Studio</li>
                        <li>NetBeans</li>
                        <li>PHPStorm</li>
                        <li>Most Major Browsers</li>
                        <li>MS Office Suite</li>
                        <li>Libre Office</li>
                        <li>VirtualBox/VMWare</li>
                        <li>IBM WebSphere</li>
                        <li>Apache Subversion</li>
                        <li>Git</li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
@stop