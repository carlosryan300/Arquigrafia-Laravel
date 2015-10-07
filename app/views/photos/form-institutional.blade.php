@extends('layouts.default')
@section('head')
	<title>Arquigrafia - Fotos - Upload</title>
	
	<link rel="stylesheet" type="text/css" href="{{ URL::to("/") }}/css/textext.css" />
	<link rel="stylesheet" type="text/css" href="{{ URL::to("/") }}/css/textext.core.css" />
	<link rel="stylesheet" type="text/css" href="{{ URL::to("/") }}/css/textext.plugin.autocomplete.css" />
	<link rel="stylesheet" type="text/css" href="{{ URL::to("/") }}/css/textext.plugin.tags.css" />
	<link rel="stylesheet" type="text/css" href="{{ URL::to("/") }}/css/styletags.css" />

	<script type="text/javascript" src="{{ URL::to("/") }}/js/textext.js"></script>
	<script type="text/javascript" src="{{ URL::to("/") }}/js/textext.core.js" charset="utf-8"></script>
	<script type="text/javascript" src="{{ URL::to("/") }}/js/textext.plugin.tags.js" charset="utf-8"></script>
	<script type="text/javascript" src="{{ URL::to("/") }}/js/textext.plugin.autocomplete.js" charset="utf-8"></script>
	<script type="text/javascript" src="{{ URL::to("/") }}/js/textext.plugin.suggestions.js" charset="utf-8"></script>
	<script type="text/javascript" src="{{ URL::to("/") }}/js/textext.plugin.filter.js" charset="utf-8"></script>
	<script type="text/javascript" src="{{ URL::to("/") }}/js/tags-autocomplete.js" charset="utf-8"></script>
	<script type="text/javascript" src="{{ URL::to("/") }}/js/textext.plugin.ajax.js" charset="utf-8"></script>


	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

	 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<script type="text/javascript" src="{{ URL::to("/") }}/js/repopulateForm.js" charset="utf-8"></script>

	<script type="text/javascript" src="{{ URL::to("/") }}/js/tag-list.js" charset="utf-8"></script>
	<script type="text/javascript" src="{{ URL::to("/") }}/js/tag-autocomplete-part.js" charset="utf-8"></script>
	<script type="text/javascript" src="{{ URL::to("/") }}/js/city-autocomplete.js" charset="utf-8"></script>
	<script type="text/javascript" src="{{ URL::to("/") }}/js/date-work.js" charset="utf-8"></script>
<style>
  .ui-autocomplete {
    max-height: 100px;
    font-size: 12px;
    overflow-y: auto;
    /* prevent horizontal scrollbar */
    overflow-x: hidden;
  }
  /* IE 6 doesn't support max-height
   * we use height instead, but this forces the menu to always be this tall
   */
  * html .ui-autocomplete {
    height: 100px;
  }
  /* Style select*/

    fieldset {
      border: 0;
      margin: 0 0 0px -10px;
      font-size: 10px;
    }
    label {
      display: block;
      margin: 30px 0 0 0;
    }
    select {
      width: 160px;
    }
    .overflow {
      height: 350px;
    }
  

  </style>
  <script type="text/javascript">
  document.onload = function() {
			}
  </script>
@stop
@section('content')
	<script type="text/javascript">
		$( window ).load(function() {
			$("#preview_photo").hide();
			if (document.getElementById("new_album-name").value != "") {
				var select_album = document.getElementsByClassName('select-album');
				var new_album = document.getElementsByClassName('new-album-name');
				var i;
				for (i = 0; i < select_album.length; i++) {
   					select_album[i].style.display = "none";
				}
				for (i = 0; i < new_album.length; i++) {
    				new_album[i].style.display = "block";
				}
			}
			else if (document.getElementById("photo_album").value != "") {
				var select_album = document.getElementsByClassName('select-album');
				var new_album = document.getElementsByClassName('new-album-name');
				var i;
				for (i = 0; i < select_album.length; i++) {
    				select_album[i].style.display = "block";
				}
				for (i = 0; i < new_album.length; i++) {
    				new_album[i].style.display = "none";
				}	
			}
		});
	</script>
	<div class="container">
		<div>
			<!--{{ Form::open(array('url'=>'photos', 'files'=> true)) }} -->
			{{ Form::open(array('url' => "photos/savePhotoInstitutional", 'files'=> true , 'id'=>"formInstitutional")) }}
				<div class="twelve columns row step-1">
					<h1><span class="step-text">Upload</span></h1>
					<div class="four columns alpha">
						<img src="" id="preview_photo">
						<p>
							{{ Form::label('photo','Imagem:') }}
							{{ Form::file('photo', array('id'=>'imageUpload', 'onchange' => 'readURL(this);')) }}
							<div class="error">{{ $errors->first('photo') }}</div>
						</p>
						<br>
					</div>
				</div>
				<div id="registration" class="twelve columns row step-2">
					<h1><span class="step-text">Dados da imagem</span></h1>
					<p>(*) Campos obrigatórios.</p>
					<p>{{ Form::hidden('pageSource', $pageSource) }} </p>

					<br>
					<div class="eight columns alpha row">
						<table class="form-table" width="100%" border="0" cellspacing="0" cellpadding="0">
							@if(Session::get('institutionId'))
							<tr>
								<td>
									<div class="two columns alpha">
										<p>{{ Form::label('support', 'Suporte*:') }}</p>
									</div>
									<div class="three columns omega">
										<p>{{ Form::text('support', Input::old('support')) }} <br>
											<div class="error">{{ $errors->first('support') }}</div>
										</p>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="two columns alpha">
										<p>{{ Form::label('tomboTxt', 'Tombo*:') }}</p>
									</div>
									<div class="three columns omega">
										<p>{{ Form::text('tombo', Input::old('tombo')) }} <br>
											<div class="error">{{ $errors->first('tombo') }}</div>
										</p>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="two columns alpha">
										<p>{{ Form::label('subjectTxt', 'Assunto*:') }}</p>
									</div>
									<div class="three columns omega">
										<p>{{ Form::text('subject', Input::old('subject')) }} <br>
											<div class="error">{{ $errors->first('subject') }}</div>
										</p>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="two columns alpha">
										<p>{{ Form::label('hygieneDateTxt', 'Data de higienização:') }}</p>
									</div>
									<div class="three columns omega">
										<p>
											{{ Form::text('hygieneDate','',array('id' => 'datePickerHygieneDate','placeholder'=>'DD/MM/AAAA')) }} 
											
											<br>
											<div class="error">{{ $errors->first('hygieneDate') }}</div>
										</p> 

									</div>
								</td>
							</tr>
														
							<tr>
								<td>
									<div class="two columns alpha">
										<p>{{ Form::label('backupDateTxt', 'Data de backup:') }}</p>
									</div>
									<div class="three columns omega">
										<p>
											{{ Form::text('backupDate','',array('id' => 'datePickerBackupDate','placeholder'=>'DD/MM/AAAA')) }}	
											<br>
											<div class="error">{{ $errors->first('backupDate') }}</div>
										</p>
									</div>
								</td>
							</tr>

							<tr>
								<td>
									<div class="two columns alpha">
										<p>{{ Form::label('characterizationTxt', 'Caracterização*:') }}</p>
									</div>
									<div class="three columns omega">
										<p>{{ Form::text('characterization', Input::old('characterization')) }} <br>
											<div class="error">{{ $errors->first('characterization') }}</div>
										</p>
									</div>
								</td>
							</tr>
<!--
							<tr>
								<td>
									<div class="two columns alpha">
										<p>{{ Form::label('cataloguingTimeTxt', 'Data de Catalogação:') }}</p>
									</div>
									<div class="three columns omega">
										<p>{{ Form::text('cataloguingTime', Input::old('cataloguingTime')) }} <br>
											<div class="error">{{ $errors->first('cataloguingTime') }}</div>
										</p>
									</div>
								</td>
							</tr>
-->
							<tr>
								<td>
									<div class="two columns alpha">
										<p>{{ Form::label('userResponsibleTxt', 'Usuário Responsável:') }}</p>
									</div>
									<div class="three columns omega">
										<p>{{ Form::text('userResponsible', $user->name,['readonly']) }} <br>
											<div class="error">{{ $errors->first('userResponsible') }}</div>
										</p>
									</div>
								</td>
							</tr>
							@endif
							<tr>
								<td>
									<div class="two columns alpha">
										<p>{{ Form::label('name', 'Título*:') }}</p>
									</div>
									<div class="three columns omega">
										<p>{{ Form::text('photo_name', Input::old('photo_name')) }} <br>
											<div class="error">{{ $errors->first('photo_name') }}</div>
										</p>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="two columns alpha">
										<p>{{ Form::label('description', 'Descrição:') }}</p>
									</div>
									<div class="three columns omega">
										<p>
											{{ Form::textarea('description', Input::old('description')) }}<br>
										</p>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="two columns alpha"><p>{{ Form::label('tags_input', 'Tags*:') }}</p></div>
									<div class="three columns">
										<p><div style="max-width:150px;">
											{{ Form::text('tags_input',null,array('id' => 'tags_input','style'=>'width: 200px; height:15px; border:solid 1px #ccc')) }}
										   </div>
											
											<br>
											<div class="error">{{ $errors->first('tagsArea') }}</div>
										</p>
									</div>
									<div>
										<button class="btn" id="add_tag" style="font-size: 11px;">ADICIONAR TAG</button>
									</div>
									<div class="five columns alpha">

										<textarea name="tagsArea" id="tagsArea" cols="60" rows="1" style="display: none;">
										</textarea>
									</div>									
								</td>
							</tr>

							<tr>
								<td>
									<br/>
									<div class="two columns alpha"><p>{{ Form::label('workAuthor', 'Autor da obra:') }}</p></div>
									<div class="two columns">
										<p><div style="max-width:150px;">

											{{ Form::text('workAuthor', $workAuthorInput, array('id' => 'workAuthor', 'placeholder' => 'SOBRENOME, nome','style'=>'height:15px; width:290px; font-size:12px; border:solid 1px #ccc')) }}
										   	
										   </div>
											
											<br>
											<div class="error">{{ $errors->first('workAuthor') }}</div>
										</p>
									</div>
									<!--<div>
										<button class="btn" id="addWorkAuthor" style="font-size: 11px;">ADICIONAR att</button>
									</div>
									<div class="five columns alpha">
										<textarea name="workAuthorArea" id="workAuthorArea" cols="60" rows="1" style="display: none;"></textarea>
									</div>-->									
								</td>
							</tr>

							<!--<tr>
								<td>
									<br/>
								<div class="two columns alpha"><p>{{ Form::label('workAuthor', 'Autor da obra:') }}</p></div>
								<div class="two columns omega">
									<p>
										{{ Form::text('workAuthor', Input::old('workAuthor')) }} <br>
									</p>
								</div>
								</td>
							</tr> -->
							<!--<tr>
								<td>@include('photos.includes.datepicker')
								</td>
							</tr>-->
														 
        					<tr>  <td>              
         						<div class="two columns alpha"><p>{{ Form::label('workDate', 'Ano de conclusão da obra:') }}</p></div>
         						<div class="six columns omega">  
          						<p>
          						<fieldset>

          							@include('photos.includes.dateList')
          							
          							<!--{{ Form::text('workDate','',array('id' => 'datePickerWorkDate','placeholder'=>'DD/MM/AAAA')) }} -->
         						<span>Não sabe a data precisa? 
         							<a  onclick="date_visibility('otherDate');" >Clique aqui.</a> </span>
         						</fieldset>	
         						<div id="otherDate" style="display:none;">         							
         							@include('photos.includes.dateWork')
         						    <!--<a onclick="close_other_date('otherDate');" class="btn right" >OK</a>-->
         						</div>
         						<label id="answer_date"></label>		
         						<br>
         						
         					</p>      
        					</div></td>
        					
        					</tr>

							
							
						</table>
					</div>
					<br class="clear">
					<div class="six columns alpha row">
						<table class="form-table" width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr><td>
								<div class="two columns alpha"><p>{{ Form::label('country', 'País*:') }}</p></div>
								<div class="two columns omega">
									<p>
										
										{{ Form::select('country', [ "Afeganistão"=>"Afeganistão", "África do Sul"=>"África do Sul", "Albânia"=>"Albânia", "Alemanha"=>"Alemanha", "América Samoa"=>"América Samoa", "Andorra"=>"Andorra", "Angola"=>"Angola", "Anguilla"=>"Anguilla", "Antartida"=>"Antartida", "Antigua"=>"Antigua", "Antigua e Barbuda"=>"Antigua e Barbuda", "Arábia Saudita"=>"Arábia Saudita", "Argentina"=>"Argentina", "Aruba"=>"Aruba", "Australia"=>"Australia", "Austria"=>"Austria", "Bahamas"=>"Bahamas", "Bahrain"=>"Bahrain", "Barbados"=>"Barbados", "Bélgica"=>"Bélgica", "Belize"=>"Belize", "Bermuda"=>"Bermuda", "Bhutan"=>"Bhutan", "Bolívia"=>"Bolívia", "Botswana"=>"Botswana", "Brasil"=>"Brasil", "Brunei"=>"Brunei", "Bulgária"=>"Bulgária", "Burundi"=>"Burundi", "Cabo Verde"=>"Cabo Verde", "Camboja"=>"Camboja", "Canadá"=>"Canadá", "Chade"=>"Chade", "Chile"=>"Chile", "China"=>"China", "Cingapura"=>"Cingapura", "Colômbia"=>"Colômbia", "Djibouti"=>"Djibouti", "Dominicana"=>"Dominicana", "Emirados Árabes"=>"Emirados Árabes", "Equador"=>"Equador", "Espanha"=>"Espanha", "Estados Unidos"=>"Estados Unidos", "Fiji"=>"Fiji", "Filipinas"=>"Filipinas", "Finlândia"=>"Finlândia", "França"=>"França", "Gabão"=>"Gabão", "Gaza Strip"=>"Gaza Strip", "Ghana"=>"Ghana", "Gibraltar"=>"Gibraltar", "Granada"=>"Granada", "Grécia"=>"Grécia", "Guadalupe"=>"Guadalupe", "Guam"=>"Guam", "Guatemala"=>"Guatemala", "Guernsey"=>"Guernsey", "Guiana"=>"Guiana", "Guiana Francesa"=>"Guiana Francesa", "Haiti"=>"Haiti", "Holanda"=>"Holanda", "Honduras"=>"Honduras", "Hong Kong"=>"Hong Kong", "Hungria"=>"Hungria", "Ilha Cocos (Keeling)"=>"Ilha Cocos (Keeling)", "Ilha Cook"=>"Ilha Cook", "Ilha Marshall"=>"Ilha Marshall", "Ilha Norfolk"=>"Ilha Norfolk", "Ilhas Turcas e Caicos"=>"Ilhas Turcas e Caicos", "Ilhas Virgens"=>"Ilhas Virgens", "Índia"=>"Índia", "Indonésia"=>"Indonésia", "Inglaterra"=>"Inglaterra", "Irã"=>"Irã", "Iraque"=>"Iraque", "Irlanda"=>"Irlanda", "Irlanda do Norte"=>"Irlanda do Norte", "Islândia"=>"Islândia", "Israel"=>"Israel", "Itália"=>"Itália", "Iugoslávia"=>"Iugoslávia", "Jamaica"=>"Jamaica", "Japão"=>"Japão", "Jersey"=>"Jersey", "Kirgizstão"=>"Kirgizstão", "Kiribati"=>"Kiribati", "Kittsnev"=>"Kittsnev", "Kuwait"=>"Kuwait", "Laos"=>"Laos", "Lesotho"=>"Lesotho", "Líbano"=>"Líbano", "Líbia"=>"Líbia", "Liechtenstein"=>"Liechtenstein", "Luxemburgo"=>"Luxemburgo", "Maldivas"=>"Maldivas", "Malta"=>"Malta", "Marrocos"=>"Marrocos", "Mauritânia"=>"Mauritânia", "Mauritius"=>"Mauritius", "México"=>"México", "Moçambique"=>"Moçambique", "Mônaco"=>"Mônaco", "Mongólia"=>"Mongólia", "Namíbia"=>"Namíbia", "Nepal"=>"Nepal", "Netherlands Antilles"=>"Netherlands Antilles", "Nicarágua"=>"Nicarágua", "Nigéria"=>"Nigéria", "Noruega"=>"Noruega", "Nova Zelândia"=>"Nova Zelândia", "Omã"=>"Omã", "Panamá"=>"Panamá", "Paquistão"=>"Paquistão", "Paraguai"=>"Paraguai", "Peru"=>"Peru", "Polinésia Francesa"=>"Polinésia Francesa", "Polônia"=>"Polônia", "Portugal"=>"Portugal", "Qatar"=>"Qatar", "Quênia"=>"Quênia", "República Dominicana"=>"República Dominicana", "Romênia"=>"Romênia", "Rússia"=>"Rússia", "Santa Helena"=>"Santa Helena", "Santa Kitts e Nevis"=>"Santa Kitts e Nevis", "Santa Lúcia"=>"Santa Lúcia", "São Vicente"=>"São Vicente", "Singapura"=>"Singapura", "Síria"=>"Síria", "Spiemich"=>"Spiemich", "Sudão"=>"Sudão", "Suécia"=>"Suécia", "Suiça"=>"Suiça", "Suriname"=>"Suriname", "Swaziland"=>"Swaziland", "Tailândia"=>"Tailândia", "Taiwan"=>"Taiwan", "Tchecoslováquia"=>"Tchecoslováquia", "Tonga"=>"Tonga", "Trinidad e Tobago"=>"Trinidad e Tobago", "Turksccai"=>"Turksccai", "Turquia"=>"Turquia", "Tuvalu"=>"Tuvalu", "Uruguai"=>"Uruguai", "Vanuatu"=>"Vanuatu", "Wallis e Fortuna"=>"Wallis e Fortuna", "West Bank"=>"West Bank", "Yémen"=>"Yémen", "Zaire"=>"Zaire", "Zimbabwe"=>"Zimbabwe"], "Brasil") }}<br>
										

										<div class="error">{{ $errors->first('country') }}</div>
									</p>
								</div>
							</td>
							</tr>
							<!--
							<tr>
								<div class="two columns omega"><p></p></div>
								<div class="two columns omega"><p><br></p></div>
							</tr>	-->
							<tr><td>
								<div class="two columns alpha"><p>{{ Form::label('state', 'Estado:') }}</p></div>
								<div class="two columns omega">
									{{ Form::select('state', [""=>"Escolha o Estado", "AC"=>"Acre", "AL"=>"Alagoas", "AM"=>"Amazonas", "AP"=>"Amapá", "BA"=>"Bahia", "CE"=>"Ceará", "DF"=>"Distrito Federal", "ES"=>"Espirito Santo", "GO"=>"Goiás", "MA"=>"Maranhão", "MG"=>"Minas Gerais", "MS"=>"Mato Grosso do Sul", "MT"=>"Mato Grosso", "PA"=>"Pará", "PB"=>"Paraíba", "PE"=>"Pernambuco", "PI"=>"Piauí", "PR"=>"Paraná", "RJ"=>"Rio de Janeiro", "RN"=>"Rio Grande do Norte", "RO"=>"Rondônia", "RR"=>"Roraima", "RS"=>"Rio Grande do Sul", "SC"=>"Santa Catarina", "SE"=>"Sergipe", "SP"=>"São Paulo", "TO"=>"Tocantins"], "") }} <br>
									
									<div class="error">{{ $errors->first('state') }}</div>
								</td>
							</tr>
							<tr><td>
								<div class="two columns alpha"><p>{{ Form::label('city', 'Cidade:') }}</p></div>
								<div class="two columns omega">
									<p>
										{{ Form::text('city', Input::old('city')) }} <br>
										<div class="error">{{ $errors->first('city') }}</div>
									</p>
								</div>
								</td>
							</tr>
							
							<tr><td>
								<div class="two columns alpha"><p>{{ Form::label('street', 'Endereço:') }}</p></div>
								<div class="two columns omega">
									<p>
										{{ Form::text('street', Input::old('street')) }} <br>
									</p>
								</div>
								<td>
							</tr>
							<tr><td>
								<div class="two columns alpha"><p>Adicione a um álbum:</p></div>
								<div class="three columns omega" style="white-space : nowrap;">
									<p>
										<div class="btn" onclick="newAlbumInput()" style="font-size: 11px; width: 76px; display: inline-block">NOVO ÁLBUM</div>
										<div class="btn" onclick="selectAlbumInput()" style="font-size: 11px; width: 104px; display: inline-block">ESCOLHER ÁLBUM</div>
									</p>
								</div>
								</td>
							</tr>
							<tr><td>
								<?php
									$albuns[""] = "Escolha o album";
									$institution = Institution::find(Session::get('institutionId'));
    								$albumsInstitutional = Album::withInstitution($institution)->get();
									foreach ($albumsInstitutional as $k => $album) {
										$albuns[$album->id]	= $album->title;
									} 
								?>
								<div class="two columns alpha select-album" style="display: none"><p>{{ Form::label('photo_album', 'Adicionar ao álbum:') }}</p></div>
								<div class="two columns omega">
									<p class="select-album" style="display: none;">
										{{ Form::select('photo_album', $albuns, "") }} <br>
									</p>	
								</div>
								</td>
							</tr>
							<tr><td>
								<div class="two columns alpha new-album-name" style="display: none"><p>{{ Form::label('new_album-name', 'Digite o nome do novo álbum:') }}</p></div>
								<div class="two columns omega">
									<p class="new-album-name" style="display: none;">
										{{ Form::text('new_album-name', Input::old('new_album-name')) }} <br>
									</p>
								</div>
								</td>
							</tr>
							<tr><td>
								
									<div class="two columns alpha"><p>{{ Form::label('imageAuthor', 'Autor da imagem*:') }}</p></div>
									<div class="two columns omega">
										<p>
											{{ Form::text('imageAuthor', $institution->name) }} 
											 <br>
											<div class="error">{{ $errors->first('imageAuthor') }}</div>
										</p>
									</div>
								</td>
							</tr>
							<tr> <td>               
         						<div class="two columns alpha"><p>{{ Form::label('imageDate', 'Data da imagem:') }}</p></div>
         						<div class="two columns omega">
          						   <p>{{ Form::text('imageDate','',array('id' => 'datePickerImageDate','placeholder'=>'DD/MM/AAAA')) }} 
         							<br> <div class="error">{{ $errors->first('imageDate') }}</div>
         							</p>       
        							</div>
        						</tr>   
        						</td>
							<tr><td>
								<div class="two columns alpha"><p>{{ Form::label('observation', 'Observações:') }}</p></div>
								<div class="two columns omega">
									<p>
										{{ Form::textarea('observation', Input::old('observation')) }} <br>

									</p>
								</div>
								</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						</table>
						<script type="text/javascript">
							function newAlbumInput() {
								var select_album = document.getElementsByClassName('select-album');
								var new_album = document.getElementsByClassName('new-album-name');
								var i;
								for (i = 0; i < select_album.length; i++) {
    								select_album[i].style.display = "none";
								}
								for (i = 0; i < new_album.length; i++) {
    								new_album[i].style.display = "block";
								}
								document.getElementById("photo_album").value = "";
							}

							function selectAlbumInput() {
								var select_album = document.getElementsByClassName('select-album');
								var new_album = document.getElementsByClassName('new-album-name');
								var i;
								for (i = 0; i < select_album.length; i++) {
    								select_album[i].style.display = "block";
								}
								for (i = 0; i < new_album.length; i++) {
    								new_album[i].style.display = "none";
								}
								document.getElementById("new_album-name").value = "";
							}
						</script>
					</div>
					<div class="five columns omega row">
						<table class="form-table" width="100%" border="0" cellspacing="0" cellpadding="0">
							
							
						</table>
					</div>
					@if(!Session::get('institutionId'))
					<div class="twelve columns omega row">
						<div class="form-group">
							*{{ Form::checkbox('authorization_checkbox', 1, true) }}
							{{ Form::label('authorization_checkbox', '&nbsp;Sou o autor da imagem ou possuo permissão expressa do autor para disponibilizá-la no Arquigrafia')}}
							<br><div class="error">{{ $errors->first('authorization_checkbox') }}</div>
						</div>
					</div>
					@endif
					<div class="twelve columns omega row">
						<label for="terms" generated="true" class="error" style="display: inline-block; "></label>	
						Escolho a licença <a href="http://creativecommons.org/licenses/?lang=pt_BR" id="creative_commons" target="_blank" style="text-decoration:underline; line-height:16px;">Creative Commons</a>, para publicar a imagem, com as seguintes permissões:			
					</div>

					<div class="four columns" id="creative_commons_left_form">
						Permitir o uso comercial da imagem?
						<br>
						 <div class="form-row">
							<input type="radio" name="allowCommercialUses" value="YES" id="allowCommercialUses" checked="checked">
							<label for="allowCommercialUses">Sim</label><br class="clear">
						 </div>
						 <div class="form-row">
							<input type="radio" name="allowCommercialUses" value="NO" id="allowCommercialUses">
							<label for="allowCommercialUses">Não</label><br class="clear">
						 </div>
					</div>
					<div class="four columns" id="creative_commons_right_form">
						Permitir modificações em sua imagem?
						<br>
						<div class="form-row">
							<input type="radio" name="allowModifications" value="YES" id="allowModifications" checked="checked">
							<label for="question_3-5">Sim</label><br class="clear">
						</div>
						<div class="form-row">
							<input type="radio" name="allowModifications" value="YES_SA" id="allowModifications">
							<label for="question_3-5">Sim, contanto que os outros compartilhem de forma semelhante</label><br class="clear">
						</div>
						<div class="form-row">
							<input type="radio" name="allowModifications" value="NO" id="allowModifications">
							<label for="question_3-5">Não</label><br class="clear">
						</div>
					</div>
					<!--<div class="twelve columns omega row">
						<h4>Álbuns do  </h4>
						<div>
							include('photos.includes.institutional_albums')
							
						</div>
					</div>-->
					
					<!--<div class="twelve columns omega row">						
						<div>
							include('photos.includes.repopulate_photos');
							
						</div>
					</div>-->
					
					<div class="twelve columns">
						<input name="enviar" type="submit" class="btn" value="ENVIAR">
						<!--<input type="button" id="btnOpenDialogRepopulate" value="ENVIAR" class="btn">-->
						<div id="dialog-confirm" title=" "></div>
					</div>
				</div>
			{{ Form::close() }}

		</div>

	</div>

	
<script type="text/javascript">

	$(document).ready(function() { 
		if({{Input::old('autoOpenModal','false')}}){ 	
					
			$( "#dialog-confirm" ).html("<b>Cadastro de imagem realizado com sucesso!</b> <br><br> Gostaria de utilizar os dados da imagem cadastrada para o próximo upload?");
			 $( "#dialog-confirm" ).dialog({
				resizable: false,
				height:180,
				modal: true,
				buttons: {
				"Sim": function() {
					$( this ).dialog( "close" );
					},
					"Não": function() {
						//$( this ).dialog( "close" );
						window.location.replace('{{ URL::to("/") }}/photos/{{Input::old('photoId')}}');
					}
				}
			}); 
		}

		/* //if({{Input::old('autoOpenModal','false')}}){ */
		@if(Input::old('tagsArea')!= null)				
			var tagsArea = {{"'".Input::old('tagsArea') ."'"}}.split(',');
			showTags(tagsArea,$('#tagsArea'),$('#tags_input'));			
		@else
			showTags({{json_encode($tagsArea)}},$('#tagsArea'),$('#tags_input'));		
		@endif

		@if( Input::old('century'))				
			var centuryInput = "{{Input::old('century')}}";
			showPeriodCentury(centuryInput);
			retrieveCentury(centuryInput);			
		@endif
		
		@if( Input::old('decade_select'))	
			var decadeInput = "{{Input::old('decade_select')}}";
			retrieveDecade(decadeInput);	
			getCenturyOfDecade(decadeInput); 		
		@endif

			@if($dates == false)				
		 		window.onload = cleanToLoad;
		 	@else
		 		window.onload = resultSelectDateWork;	
			@endif

			@if( Input::old('dates'))				
		 		window.onload = resultSelectDateWork;
			@endif

   });
</script>


@stop