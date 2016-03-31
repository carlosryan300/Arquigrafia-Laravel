@extends('layouts.default')

@section('head')
  <title>Arquigrafia - Seu universo de imagens de arquitetura</title>
  <link rel="stylesheet" href="{{ asset('/css/slickQuiz.css') }}">
@stop

@section('content')
  <div class="container">
    <div class="twelve columns" id="slickQuiz">
      <h1 class="quizName">{{-- Teste o seu conhecimento! --}}<!-- where the quiz name goes --></h1>

      <div class="quizArea">
        <div class="quizHeader">
        <!-- where the quiz main copy goes -->
        <a class="startQuiz" href="#">COMEÇAR O QUIZ!</a>
        </div>

        <!-- where the quiz gets built -->
      </div>

      <div class="quizResults">
        <h3 class="quizScore">
        Seu resultado: <span><!-- where the quiz score goes --></span>
        </h3>

        <h3 class="quizLevel"><strong>Ranking:</strong>
        <span><!-- where the quiz ranking level goes --></span>
        </h3>

        <div class="quizResultsCopy">
        <!-- where the quiz result copy goes -->
        </div>
      </div>
    </div>
  </div>
  <style type="text/css">
    * {
      margin: 0;
      padding: 0;
    }

    #slickQuiz {
      font-size: 16px !important;
    }
    h1 {
      font-size: 26px;
      margin: 0 0 20px;
    }
    h2 {
      font-size: 22px;
      margin: 15px 0;
    }
    h3 {
      font-size: 18px;
      margin: 15px 0 10px;
    }
    h4 {
      font-size: 16px;
      margin: 10px 0;
    }
    h5 {
      font-size: 14px;
      margin: 10px 0 5px;
    }
    h6 {
      font-size: 12px;
      margin: 5px 0;
    }

    strong { font-weight: bold; }
    em { font-style: italic; }
    ul { list-style-type: circle; }
    ol { list-style-type: decimal; }
    ol li { list-style-type: decimal; margin-left: 20px; }

    .button {
      background: #fff; color: #444; border: solid 1px #ddd;
      font-size: 12px; font-weight: bold; padding: 5px 10px;
      -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;
    }
    .button:hover, .btn:hover a {
      color: #222; text-decoration: none; cursor: pointer; border-color: #aaa;
    }

    .startQuiz {
      margin-top: 40px;
    }

    .tryAgain {
      float: none;
      margin: 20px 0;
    }

    /* clearfix */
    .quizArea, .quizResults {
      zoom: 1;
    }
    .quizArea:before, .quizArea:after, .quizResults:before, .quizResults:after {
      content: "\0020";
      display: block;
      height: 0;
      visibility: hidden;
      font-size: 0;
    }
    .quizArea:after, .quizResults:after {
      clear: both;
    }

    .questionCount {
      font-size: 14px;
      font-style: italic;
    }
    .questionCount span {
      font-weight: bold;
    }

    ol.questions {
      margin-top: 20px;
      margin-left: 0;
      padding-left: 10px;
    }
    
    ol.questions li {
      margin-left: 0;
    }

    ul.answers {
      margin-left: 10px;
      margin-top: 20px;
      margin-bottom: 20px;
    }

    ul.answers li {
      margin-bottom: 8px;
    }

    ul.responses li {
      margin: 10px 20px 20px;
    }
    ul.responses li p span {
      display: block;
      font-weight: bold;
      font-size: 18px;
    }
    .complete ul.answers li.correct, ul.responses li.correct p span {
      color: #6C9F2E;
    }
    ul.responses li.incorrect p span {
      color: #B5121B;
    }

    .quizResults h3 {
      margin: 0;
    }
    .quizResults h3 span {
      font-weight: normal;
      font-style: italic;
    }
    .quizResultsCopy {
      clear: both;
      margin-top: 20px;
    }

    .questionImage {
      max-height: 450px;
      max-width: 540px;
    }
  </style>
  
  <script src="{{ asset('/js/gamification/slickQuiz.js') }}"></script>
  
  <script>
    var quizJSON = {
      "info": {
        "name":  "Teste o seu conhecimento sobre a arquitetura brasileira!",
        "main":  "",
        "results": "", //"<h5>Saiba mais</h5><p>Coloque o texto para saiba mais em info.results</p>",
        "level1":  "Excelente! Melhore ainda mais seus conhecimentos de arquitetura com o Arquigrafia!", //"Nível mais alto",
        "level2":  "Bom! Você pode melhorar ainda mais seus conhecimentos de arquitetura  com o Arquigrafia!", //"Nível alto",
        "level3":  "Regular. Melhore seus conhecimentos com o Arquigrafia.", //"Nível médio",
        "level4":  "Insuficiente. O Arquigrafia pode lhe ajudar a melhorar seus conhecimentos de arquitetura.", //"Níel baixo",
        "level5":  "Você precisa estudar mais. O Arquigrafia pode lhe ajudar a melhorar seus conhecimentos de arquitetura." //"Nível mais baixo"// no comm here
      },
      "questions": [
        {
          "q": "Você conhece o autor desta obra?",
          "a": [
            {"option": "Oscar Niemeyer",    "correct": false},
            {"option": "Lúcio Costa",   "correct": false},
            {"option": "João Batista Vilanova Artigas",    "correct": true}
          ],
          "img": "arquigrafia-images/1822_view.jpg",
          "correct": "<p><span>Acertou!</span> </p>", //Altere ou remova este texto no campo 'correct' desta pergunta!</p>",
          "incorrect": "<p><span>Errou! A resposta correta seria João Batista Vilanova Artigas. </span> </p>" //Altere ou remova este texto no campo 'incorrect' desta pergunta</p>" // no comma here
        },
        {
          "q": "Dentre os seguintes elementos, qual não fez parte desta obra?",
          "a": [
            {"option": "Telha",         "correct": false},
            {"option": "Concreto",   "correct": true},
            {"option": "Madeira",         "correct": false}
          ],
          "img": "arquigrafia-images/4611_view.jpg",
          "correct": "<p><span>Acertou!</span> </p>", // Altere ou remova este texto no campo 'correct' desta pergunta!</p>",
          "incorrect": "<p><span>Errou! A resposta correta seria Concreto.</span> </p>" //Altere ou remova este texto no campo 'incorrect' desta pergunta</p>" // no comma here
        },
        {
          "q": "Você conhece o período de construção desta obra?",
          "a": [
            {"option": "Entre 1958 e 1971",       "correct": true},
            {"option": "Entre 2001 e 2010",          "correct": false},
            {"option": "Entre 1791 e 1800",  "correct": false}
          ],
          "img": "arquigrafia-images/872_view.jpg",
          "correct": "<p><span>Acertou!</span> </p>", //Altere ou remova este texto no campo 'correct' desta pergunta!</p>",
          "incorrect": "<p><span>Errou! A resposta correta seria Entre 1958 e 1971.</span> </p>" //Altere ou remova este texto no campo 'incorrect' desta pergunta</p>" // no comma here
        },
        {
          "q": "Esta arquitetura brasileira é típica de qual século?",
          "a": [
            {"option": "XVIII",  "correct": false},
            {"option": "XIX",   "correct": false},
            {"option": "XX",    "correct": true}
          ],
          "img": "arquigrafia-images/3347_view.jpg",
          "correct": "<p><span>Acertou!</span> </p>", //Altere ou remova este texto no campo 'correct' desta pergunta!</p>",
          "incorrect": "<p><span>Errou! A resposta correta seria Século XX. </span> </p>" //Altere ou remova este texto no campo 'incorrect' desta pergunta</p>" // no comma here
        },
        {
          "q": "Esta imagem de arquitetura apresenta o estilo e olhar únicos de qual fotógrafo?",
          "a": [
            {"option": "Cristiano Alckmin Mascaro",  "correct": true},
            {"option": "Nelson Kon", "correct": false},
            {"option": "Erieta Attali", "correct": false}
          ],
          "img": "arquigrafia-images/861_view.jpg",
          "correct": "<p><span>Acertou!</span> </p>", //Altere ou remova este texto no campo 'correct' desta pergunta!</p>",
          "incorrect": "<p><span>Errou! A resposta correta seria Cristiano Alckmin Mascaro.</span> </p>" //Altere ou remova este texto no campo 'incorrect' desta pergunta</p>" // no comma here
        } // no comma here
      ]
    };

    $(function () {
      $('#slickQuiz').slickQuiz({
        "questionCountText": "Questão %current de %total",
        "checkAnswerText": "Confirmar",
        "nextQuestionText": "Próxima &raquo;",
        "skipStartButton": true
      });
    });
  </script>
@stop
