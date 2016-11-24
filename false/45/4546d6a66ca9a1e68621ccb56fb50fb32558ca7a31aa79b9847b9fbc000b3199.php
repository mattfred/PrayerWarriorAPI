<?php

/* index.html */
class __TwigTemplate_2ed6126c743a9bfbe9370ea3ecee2d6ccc51e99bdb2771950be8e3ff49d115bf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\" ng-app=\"mattfredApp\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"description\" content=\"Mobile Applications by Matthew Frederick\">
    <meta name=\"keywords\" content=\"mobile, development, android, ios\">
    <meta name=\"author\" content=\"Matthew Frederick\">
    <script src=\"https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js\"></script>
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css\">
    <script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
    <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

    <link rel=\"stylesheet\" href=\"css/index.css\">
    <script src=\"js/mattfred.js\"></script>

    <title>Home</title>
    <link rel=\"icon\" href=\"images/logoWhite.png\">
</head>
<body>

<div ng-controller=\"HomeController\">
    <nav class=\"navbar navbar-default navbar-fixed-top\">
        <div class=\"container-fluid\">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\"
                        data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
                <a class=\"navbar-brand\" href=\"#\">
                    <img class=\"image-logo\" src=\"images/logoWhite.png\" alt=\"logo\">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
                <ul class=\"nav navbar-nav\">
                    <li class=\"active\"><a href=\"index.html\">Home <span class=\"sr-only\">(current)</span></a></li>
                    <li><a href=\"about.html\">About</a></li>
                    <li><a href=\"contact.php\">Contact</a></li>
                </ul>
                <ul class=\"nav navbar-nav navbar-right\">
                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\"
                           aria-expanded=\"false\">Mobile Applications<span class=\"caret\"></span></a>
                        <ul class=\"dropdown-menu\">
                            <li><a href=\"streamit.html\">StreamIt</a></li>
                            <li><a href=\"dole.html\">Dole</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class=\"services container\">
        <div class=\"page-header\">
            <h1>Mobile Applications</h1>
        </div>
        <div class=\"row\">
            <div class=\"col-sm-6 col-md-4\">
                <div class=\"thumbnail\">
                    <img src=\"images/dole.png\" alt=\"Dole\">
                    <div class=\"caption\">
                        <h3>Dole</h3>
                        <p>The Ultimate Tipping App</p>
                        <p><a href=\"dole.html\" class=\"btn btn-primary\" role=\"button\">More Information</a></p>
                    </div>
                </div>
            </div>
            <div class=\"col-sm-6 col-md-4\">
                <div class=\"thumbnail\">
                    <img src=\"images/streamit.png\" alt=\"StreamIt\">
                    <div class=\"caption\">
                        <h3>StreamIt</h3>
                        <p>Find movies and shows online quickly and easily</p>
                        <p><a href=\"streamit.html\" class=\"btn btn-primary\" role=\"button\">More Information</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js\"></script>
<link rel=\"stylesheet\" href=\"//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css\">
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js\"></script>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index.html", "/Users/matthewfrederick/IdeaProjects/PrayerWarriorAPI/templates/index.html");
    }
}
