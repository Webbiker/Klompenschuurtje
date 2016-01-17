[[$Header? ]]
<article>
    [[*content]]
    [[!FormIt?
        &hooks=`email,redirect`
        &emailTpl=`emailContactTpl`
        &emailTo=`info@klompenschuurtje.nl`
        &emailFrom=`[[+email]]`
        &emailFromName=`[[+name]]`
        &emailSubject=`[[+subject]]`
        &redirectTo=`22`
        &validate= `name:required,
                    email:email:required,
                    workemail:blank
    ]]
    <form class="contactForm" id="contactForm" method="post" action="[[~[[*id]]]]">
        <p>
            <label>Naam:</label>
            <input type="text" name="name" id="name" value="[[!+fi.name]]">
            <span class="asterix">*</span>
            [[!+fi.error.name]]
        </p>
        <p>
            <label>E-mail:</label>
            <input type="text" name="email" id="email" value="[[!+fi.email]]">
            <span class="asterix">*</span>
            [[!+fi.error.email]]
        </p>
        <p>
            <label>Telefoonnummer:</label>
            <input type="text" name="phone" id="phone" value="[[!+fi.phone]]">
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
            <label>Uw bericht:</label><textarea name="message" id="message">[[!+fi.message]]</textarea>
        </p>
        <p>
            <input type="hidden" name="workemail" value="" />
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