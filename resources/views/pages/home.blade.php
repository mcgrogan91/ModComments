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
    .info>li {
        padding: 5px;
    }

    ul
    {
        list-style-type: none;
    }

    #skills>ul {
        padding-left: 15px;
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
            <div class="title">Senior Software Developer</div>
            <div class="employer">University of Pennsylvania Health System - Way to Health</div>
            <div class="dates">
                February 2017 - Current
            </div>
            <ul class="info">
                <li>Developed, maintained and supported a web-based behavioral research platform servicing over 1 million study participants built using the Symfony 1 framework and Vue</li>
                <li>Designed and implemented a well documented and secure public REST API to support both internal and vendor built applications.</li>
                <li>Assisted the growing team in making both organizational and technical improvements by suggesting new workflows and tools to improve productivity and performance.</li>
            </ul>
        </div>

        <div class="job">
            <div class="title">Web Developer</div>
            <div class="employer">d'Vinci Interactive</div>
            <div class="dates">
                October 2014 - February 2017
            </div>
            <ul class="info">
                <li>Developed PHP solutions in an agile development environment using both the CodeIgniter and Laravel PHP Frameworks.</li>
                <li>Worked with an in-house message queueing system, and facilitating a transition to a standard tested
                    message queueing service.</li>
            </ul>
        </div>

        <div class="job">
            <div class="title">Software Engineer</div>
            <div class="employer">Versatile Systems, Inc</div>
            <div class="dates">
                February 2014 - October 2014
            </div>
            <ul class="info">
                <li>Redesigned core aspects of a JavaEE based Kiosk application which enabled stores to offer
                instant in-store credit decisions from over 30 different lenders by interacting with their
                each of their SOAP API's. This resulted in millions of dollars of approved credit quarterly and a
                    30% increase in sales.</li>
                <li>Improved and tested a web-based Screenflow designer that leveraged AngularJS to
                present a clean interface which allowed clients to design their own content and upload it to
                    their kiosks employing multiple built in gadgets for the clients convenience.</li>
                <li>Lead a website redesign of an existing NodeJS website, rewriting most of the HTML/CSS front end.</li>
            </ul>
        </div>

        <div class="job">
            <div class="title">Programmer/Analyst I</div>
            <div class="employer">Global Data Consultants</div>
            <div class="dates">
                September 2013 - February 2014
            </div>
            <ul class="info">
                <li>Developed a message processing service that worked with an existing liquid
                dispensing system that communicated with DB2 and iSeries databases to determine
                if a liquid should be dispensed, and to record information about what liquids
                    were dispensed using the Microsoft .NET framework.</li>
                <li>Wrote detailed design and technical documentation approved by business and the
                customer laying out how a service would work, as well as what the inputs and outputs
                    would be.</li>
            </ul>
        </div>

        <div class="job">
            <div class="title">Programmer/Analyst I</div>
            <div class="employer">Benecard PBF</div>
            <div class="dates">
                February 2013 - September 2013
            </div>
            <ul class="info">
                <li>Worked with the highly-normalized IBM Health Plan Data Model (HPDM) and DB2 9.1/10.0
                for the large majority of required data, implementing mission-critical functionality
                in a large in-house J2EE project, including both frontend JSP/JSF technologies and
                    backend Enterprise Beans.</li>
                <li>Aided development with a large scale Enterprise Java system to update and create new
                    functionalities based on business requirements.</li>
                <li>Ported existing PDF mail-merge templates to HTML5 and CSS3, using Apache Velocity for form-filling.</li>
            </ul>
        </div>

        <div class="job">
            <div class="title">Student Developer</div>
            <div class="employer">Keystone Library Network</div>
            <div class="dates">
                September 2011 - May 2013
            </div>
            <ul class="info">
                <li>Assisted the core project developer of the VuFind Integrated Library System (ILS) in bugfixes and
                    feature progression.</li>
                <li>Contributed to several enterprise-scale components in an effort to improve flexibility and security.</li>
            </ul>
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
                    <li>PHP (Laravel, Symfony 1, Zend 2, CodeIgniter)</li>
                    <li>Javascript (jQuery, AngularJS, nodeJS)</li>
                    <li>MySQL</li>
                    <li>PostgreSQL</li>
                    <li>Java EE</li>
                    <li>.NET</li>
                    <li>HTML5</li>
                    <li>CSS3</li>
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
                    <li>Mac OS X</li>
                </ul>
            </li>
            <li>
                <span class="title">Applications/Other:</span>
                <ul>
                    <li>Eclipse IDE ( + Spring Tool Suite)</li>
                    <li>Visual Studio</li>
                    <li>NetBeans</li>
                    <li>PHPStorm</li>
                    <li>Sublime Text</li>
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