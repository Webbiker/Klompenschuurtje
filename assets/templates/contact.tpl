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
            <label>[[++label_name]]:</label>
            <input type="text" name="name" id="name" value="[[!+fi.name]]">
            <span class="asterix">*</span>
            [[!+fi.error.name]]
        </p>
        <p>
            <label>[[++label_email]]:</label>
            <input type="text" name="email" id="email" value="[[!+fi.email]]">
            <span class="asterix">*</span>
            [[!+fi.error.email]]
        </p>
        <p>
            <label>[[++label_phone]]:</label>
            <input type="text" name="phone" id="phone" value="[[!+fi.phone]]">
        </p>
        <p>
            <label>[[++label_moreinfo]]:</label>
            <select name="subject" id="subject">
                <option value="">[[++option_choice]]</option>
                <option value="Demonstraties">[[++option_demonstrations]]</option>    
                <option value="Workshops">[[++option_workshop]]</option>    
                <option value="Klomptochten">[[++option_clogtrips]]</option> 
                <optgroup label="[[++option_clogs]]">
                    <option value="Handgeschilderde klompen">[[++option_painted]]</option>  
                    <option value="Klompen met logo">[[++option_brand]]</option>  
                    <option value="FUN klompen">[[++option_fun]]</option>    
                    <option value="Geboorte klompen">[[++option_birth]]</option>  
                    <option value="Airbrush klompen">[[++option_airbrush]]</option>
                    <option value="Ingebrande klompen">[[++option_burned]]</option>
                </optgroup>
                <option value="Souvenirs">[[++option_souvenirs]]</option>    
                <option value="Relatiegeschenken">[[++option_gifts]]</option>    
                <option value="Speelgoed">[[++option_toys]]</option>    
                <option value="Diversen">[[++option_various]]</option>  
                <option value="Iets anders, namelijk:">[[++option_other]]</option>  
            </select>
        </p>
        <p>
            <label>[[++label_message]]:</label><textarea name="message" id="message">[[!+fi.message]]</textarea>
        </p>
        <p>
            <input type="hidden" name="workemail" value="" />
            <label>&nbsp;</label><input type="submit" value="[[++btn_send]]" class="button big">
        </p>
        <p class="voetnoot">[[++label_asterix_part1]] (<span class="asterix">*</span>) [[++label_asterix_part2]]</p>
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