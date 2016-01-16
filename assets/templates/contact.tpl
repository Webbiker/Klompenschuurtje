[[$Header? ]]
<article>
	<h1>Informatie aanvragen</h1>
	<p>Wilt u graag draagklompen of souvenirs
	bestellen of heeft u een vraag over één van onze workshops? Wilt u graag een fietstocht met picknick maken of een demonstratie bijwonen of heeft u gewoon een vraag? U kunt altijd informatie aanvragen via ons contactformulier.</p>
	<p>Wij willen u graag van dienst zijn, dus stelt u
	ons uw vraag en wij zoeken voor u het juiste product of antwoord.</p>
	<form class="contactForm" id="contactForm" method="post" action="vraag-en-antwoord/infoaanvragen.html">
		<p>
			<label>Naam:</label>
			<input type="text" name="naam" id="naam" value="">
			<span class="asterix">*</span>
			<span class="error"></span>
		</p>
		<p>
			<label>E-mail:</label>
			<input type="text" name="email" id="email" value="">
			<span class="asterix">*</span>
			<span class="error"></span>
		</p>
		<p>
			<label>Telefoonnummer:</label>
			<input type="text" name="phone" id="phone" value="">
		</p>
		<p>
			<label>Ik wil informatie over:</label>
			<select name="subject" id="subject">
				<option value="">Maak een keuze</option>
				<option value="Demonstraties">Demonstraties</option>	
				<option value="Workshops">Workshops</option>	
				<option value="Klomptochten">Klomptochten, "Trap terug in de tijd"</option>	
				<optgroup label="Draagklompen">
					<option value="Handgeschilderde klompen">Handgeschilderde klompen</option>	
					<option value="Klompen met logo">Klompen met logo</option>	
					<option value="FUN klompen">FUN klompen</option>	
					<option value="Geboorte klompen">Geboorte klompen</option>	
					<option value="Airbrush klompen">Airbrush klompen</option>
					<option value="Ingebrande klompen">Ingebrande klompen</option>
				</optgroup>
				<option value="Souvenirs">Souvenirs</option>	
				<option value="Relatiegeschenken">Relatiegeschenken</option>	
				<option value="Speelgoed">Speelgoed</option>	
				<option value="Diversen">Diversen</option>	
				<option value="Iets anders, namelijk:">Iets anders, namelijk:</option>	
			</select>
		</p>
		<p>
			<label>Uw bericht:</label><textarea name="message" id="message" value=""></textarea>
		</p>
		<p>
			<label>&nbsp;</label><input type="submit" value="Verzend" class="button big">
		</p>
		<p class="voetnoot">Velden met een asterix (<span class="asterix">*</span>) zijn verplichte velden.</p>
        <input type="hidden" name="workemail" value="">
	</form>
</article>

<aside>
    <nav>
        [[$Navigation Sub Contact? ]]
    </nav>
    [[$Share? ]]
</aside>
[[$Footer? ]]