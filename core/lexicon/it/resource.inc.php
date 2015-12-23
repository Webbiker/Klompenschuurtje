<?php
/**
 * Resource English lexicon topic
 *
 * @language en
 * @package modx
 * @subpackage lexicon
 */
$_lang['access'] = 'Accesso';
$_lang['cache_output'] = 'Output cache';
$_lang['changes'] = 'Modifiche';
$_lang['class_key'] = 'Chiave Classe (nome univoco)';
$_lang['context'] = 'Contesto';
$_lang['document'] = 'Risorsa';
$_lang['document_create'] = 'Crea Documento';
$_lang['document_create_here'] = 'Risorsa';
$_lang['document_new'] = 'Nuovo Documento';
$_lang['documents'] = 'Documenti';
$_lang['duplicate_uri_found'] = 'La Risorsa [[+id]] sta già usando l\'URI [[+uri]]. Inserisci un alias univoco o usa la funziona Congela (Freeze) URI per sovrasciverlo manualmente.';
$_lang['empty_template'] = '(vuoto)';
$_lang['general'] = 'Generale';
$_lang['markup'] = 'Markup/Struttura';
$_lang['none'] = 'Nessuno';
$_lang['page_settings'] = 'Parametri';
$_lang['preview'] = 'Anteprima';
$_lang['resource_access_message'] = 'Qui puoi selezionare a quali Gruppi Risorse appartiene questa risorsa.';
$_lang['resource_add_children_access_denied'] = 'Non hai il permesso di creare una Risorsa qui.';
$_lang['resource_alias'] = 'Alias Risorsa';
$_lang['resource_alias_help'] = 'Inserisci alias per questa risorsa. Questo renderà la risorsa accessibile tramite:<br />http://tuoserver/alias<br /><strong>Nota Bene:</strong> Funzionerà SOLO se stai usando i "friendly URLs".';
$_lang['resource_change_template_confirm'] = 'Sei sicuro di voler cambiare Template? ATTENZIONE: In tal caso saranno salvati i tuoi cambiamenti e sarà ricaricata la pagina; assicurati di esser pronto per questa azione prima di procedere. Dopo che la pagina è stata ricaricata, dovrai salvare nuovamente non appena sarai pronto a salvare il cambiamento del Template.';
$_lang['resource_cacheable'] = 'Inseribile in cache';
$_lang['resource_cacheable_help'] = 'Quando attivato (selezionato), la risorsa sarà salvata in cache.';
$_lang['resource_cancel_dirty_confirm'] = 'Hai modifiche in corso; sei sicuro di voler cancellare?';
$_lang['resource_class_key_help'] = 'Questa è la Chiave della classe della risorsa, che mostra il suo tipo di MODX.';
$_lang['resource_content'] = 'Contenuto';
$_lang['resource_contentdispo'] = 'Disposizione Contenuto';
$_lang['resource_contentdispo_help'] = 'Usa il campo Disposizione contenuto per specificare come sarà gestita questa risorsa dal browser. Per i download seleziona l\'opzione Allegato.';
$_lang['resource_content_type'] = 'Tipo di Contenuto';
$_lang['resource_content_type_help'] = 'Il Tipo di Contenuto di questa risorsa. Se non sei sicuro sul tipo di contenuto che dovrebbe avere la risorsa, lascia text/html.';
$_lang['resource_create_access_denied'] = 'Non hai il permesso di creare  Risorse.';
$_lang['resource_create_here'] = 'Risorsa';
$_lang['resource_createdby'] = 'Creata da';
$_lang['resource_createdon'] = 'Creata il';
$_lang['resource_delete'] = 'Elimina';
$_lang['resource_delete_confirm'] = 'Sei sicuro di voler cancellare questa risorsa?<br />NOTA: saranno cancellate anche le sue risorse figlio!';
$_lang['resource_description'] = 'Descrizione';
$_lang['resource_description_help'] = 'Questa è una descrizione personale e facoltativa della risorsa.';
$_lang['resource_duplicate'] = 'Duplica';
$_lang['resource_duplicate_confirm'] = 'Sei sicuro di voler duplicare questa risorsa? Ogni elemento in essa contenuto sarà a sua volta duplicato.';
$_lang['resource_edit'] = 'Modifica';
$_lang['resource_editedby'] = 'Modificato da';
$_lang['resource_editedon'] = 'Modificato il';
$_lang['resource_err_change_parent_to_folder'] = 'Si è verificato un errore cercando di convertire  il genitore della risorsa in cartella.';
$_lang['resource_err_class'] = 'La risorsa non è un valido [[+class]].';
$_lang['resource_err_create'] = 'Si è verificato un errore cercando di creare la risorsa.';
$_lang['resource_err_delete'] = 'Si è verificato un errore cercando di cancellare la risorsa.';
$_lang['resource_err_delete_children'] = 'Si è verificato un errore cercando di cancellare il figlio della risorsa.';
$_lang['resource_err_delete_container_sitestart'] = 'La risorsa che stai cercando di cancellare è un contenitore e contiene la risorsa [[+id]]. Questa risorsa è indicata come \'Site start\' (pagina iniziale) quindi non può essere cancellata. Se vuoi cancellarla cambia la risorsa impostata come \'Site start\' e riprova.';
$_lang['resource_err_delete_container_siteunavailable'] = 'La risorsa che stai cercando di cancellare è un contenitore e contiene la risorsa [[+id]]. Questa risorsa è indicata come  \'Site unavailable page\' (pagina da mostrare quanto il sito non è raggiungibile) quindi non può essere cancellata. Se vuoi cancellarla cambia la risorsa impostata come \'Site unavailable page\' e riprova.';
$_lang['resource_err_delete_sitestart'] = 'La risorsa è impostata come pagina iniziale \'Site start\' e non può essere cancellata!';
$_lang['resource_err_delete_siteunavailable'] = 'La risorsa è usata come  \'Site unavailable page\' e non può essere cancellata!';
$_lang['resource_err_duplicate'] = 'Si è verificato un errore cercando di duplicare la risorsa.';
$_lang['resource_err_move_to_child'] = 'Non puoi spostare una risorsa (annidarla) sotto una sua stessa risorsa figlio.';
$_lang['resource_err_move_sitestart'] = 'La risorsa è collegata alla variabile site_start e non può essere spostata in un altro contesto!';
$_lang['resource_err_nf'] = 'Risorsa non trovata.';
$_lang['resource_err_nfs'] = 'Risorsa  con ID: [[+id]] ,non trovata';
$_lang['resource_err_ns'] = 'Risorsa non specificata.';
$_lang['resource_err_own_parent'] = 'La risorsa non può essere genitore di se stessa.';
$_lang['resource_err_publish']  = 'Si è verificato un errore cercando di pubblicare la risorsa.';
$_lang['resource_err_new_parent_nf'] = 'Nuova risorsa genitore con id [[+id]], non trovata.';
$_lang['resource_err_remove'] = 'Si è verificato un errore cercando di rimuovere la risorsa.';
$_lang['resource_err_save'] = 'Si è verificato un errore cercando di salvare la risorsa.';
$_lang['resource_err_select_parent'] = 'Seleziona una risorsa genitore.';
$_lang['resource_err_undelete'] = 'Si è verificato un errore cercando di ripristinare la cancellazione di una risorsa.';
$_lang['resource_err_undelete_children'] = 'Si è verificato un errore cercando di ripristinare la cancellazione di un figlio della risorsa.';
$_lang['resource_err_unpublish'] = 'Si è verificato un errore cercando di de-pubblicare la risorsa.';
$_lang['resource_err_unpublish_sitestart'] = 'La risorsa è collegata alla variabile site_start  e non può essere ritirata (de-pubblicata)!';
$_lang['resource_err_unpublish_sitestart_dates'] = 'La risorsa è collegata alla variabile site_start e non si possono impostare date di pubblicazione o ritiro!';
$_lang['resource_folder'] = 'Contenitore';
$_lang['resource_folder_help'] = 'Attivare per rendere la risorsa anche un contenitore di altre risorse. Un \'Contenitore\' è come una cartella, però può anche avere un contenuto (Content: text,html,...).';
$_lang['resource_group_resource_err_ae'] = 'La risorsa è già parte di questo gruppo risorse.';
$_lang['resource_group_resource_err_nf'] = 'La risorsa non è parte di questo gruppo risorse.';
$_lang['resource_hide_from_menus'] = 'Nascondi nei menu';
$_lang['resource_hide_from_menus_help'] = 'Quando attivo, la risorsa <b>NON</b> sarà disponibile per essere inserita nei menu web. Nota Bene: alcuni Costruttori di Menu (snippet, plugin)  potrebbero ignorare questa opzione.';
$_lang['resource_link_attributes'] = 'Attributi Link';
$_lang['resource_link_attributes_help'] = 'Attributi per il link di questa risorsa, come target= o  rel=.';
$_lang['resource_locked_by'] = 'La risorsa è attualmente bloccata da [[+user]]';
$_lang['resource_longtitle'] = 'Titolo Esteso';
$_lang['resource_longtitle_help'] = 'Questo è il titolo esteso della risorsa. E\' utile per i motori di ricerca e potrebbe essere più descrittivo per la risorsa.';
$_lang['resource_menuindex'] = 'Indice Menu';
$_lang['resource_menuindex_help'] = 'Questo è l\'ordine della risorsa nella struttura ad albero . Normalmente è usato per l\'ordinamento nel mostrare dinamicamente le risorse. Maggiore è il numero  più bassa sarà la sua posizione nell\'albero.<br />Nota Bene: Alcuni componenti potrebbero ignorare questi valori.';
$_lang['resource_menutitle'] = 'Titolo Menu';
$_lang['resource_menutitle_help'] = 'Il titolo menu è il nome che puoi utilizzare dentro i tuoi snippet(s) di menu.';
$_lang['resource_new'] = 'Nuova Risorsa';
$_lang['resource_notcached'] = 'Questa risorsa non è (ancora) stata inserita in cache.';
$_lang['resource_pagetitle'] = 'Titolo';
$_lang['resource_pagetitle_help'] = 'Il nome/titolo della risorsa. Evita l\'utilizzo di backslashes nel nome!';
$_lang['resource_parent'] = 'Risorsa Genitore';
$_lang['resource_parent_help'] = 'Inserisci l\'ID della risorsa genitore.';
$_lang['resource_parent_select_node'] = 'Seleziona un nodo nella struttura ad albero a sinistra.';
$_lang['resource_publish'] = 'Pubblicare';
$_lang['resource_publish_confirm'] = 'Pubblicando ora questa risorsa si rimuovono eventuali date di pubblicazione/ritiro impostate precedentemente. Se hai intenzione di settare o mantenere date di pubblicazione o ritiro, seleziona Modifica Risorsa.<br />Procedere?';
$_lang['resource_publishdate'] = 'Data Pubblicazione';
$_lang['resource_publishdate_help'] = 'Se setti una data di pubblicazione, la risorsa sarà pubblicata non appena la data è raggiunta. Clicca sull\'icona del calendario per selezionare una data,lascia in bianco per fare in modo che la risorsa non venga pubblicata in automatico.';
$_lang['resource_published'] = 'Pubblicato';
$_lang['resource_published_help'] = 'Quando pubblicata la risorsa è immediatamente  disponibile al pubblico  dopo il salvataggio.';
$_lang['resource_publishedby'] = 'Pubblicata da';
$_lang['resource_publishedon'] = 'Pubblicati!';
$_lang['resource_publishedon_help'] = 'La data in cui la risorsa è stata pubblicata.';
$_lang['resource_refresh'] = 'Aggiorna';
$_lang['resource_richtext'] = 'Rich Text';
$_lang['resource_richtext_help'] = 'Quando attivato verrà utilizzato il rich text editor per modificare le risorse. Se le risorse contengono JavaScript et simila, disattivalo per modificarle in modalità  HTML così l\'editor non danneggerà il codice.';
$_lang['resource_searchable'] = 'Ricercabile';
$_lang['resource_searchable_help'] = 'Quando attivato, la risorsa può essere ricercata. Questo parametro può anche essere usato per altri scopi nei tuoi snippet.';
$_lang['resource_settings'] = 'Configurazione Risorsa';
$_lang['resource_status'] = 'Status';
$_lang['resource_status_help'] = 'Quando pubblicata la risorsa è disponibile al pubblico subito dopo il salvataggio. Altrimenti, rimane nascosta nel sito pubblico.';
$_lang['resource_summary'] = 'Sintesi (introtext)';
$_lang['resource_summary_help'] = 'Un breve riassunto della risorsa.';
$_lang['resource_syncsite'] = 'Svuota Cache';
$_lang['resource_syncsite_help'] = 'Se attivato, MODX svuoterà la cache dopo il salvataggio della risorsa. In questo modo i tuoi visitatori non vedranno la versione vecchia.';
$_lang['resource_template'] = 'Template utilizzato';
$_lang['resource_template_help'] = 'Il template utilizzato per la risorsa.';
$_lang['resource_undelete'] = 'Ripristina';
$_lang['resource_unpublish'] = 'Ritira';
$_lang['resource_unpublish_confirm'] = 'Ritirando ora questa risorsa si rimuovono eventuali date di pubblicazione/ritiro impostate precedentemente. Se hai intenzione di settare o mantenere date di pubblicazione o ritiro, seleziona Modifica Risorsa.<br />Procedere?';
$_lang['resource_unpublishdate'] = 'Data Ritiro ';
$_lang['resource_unpublishdate_help'] = 'Se setti una data di ritiro, la risorsa sarà ritirata non appena la data è raggiunta. Clicca sull\'icona del calendario per selezionare una data, o lascia bianco per fare in modo che la risorsa NON venga ritirata in automatico.';
$_lang['resource_unpublished'] = 'Ritirato';
$_lang['resource_untitled'] = 'Risorsa senza titolo';
$_lang['resource_uri'] = 'URI';
$_lang['resource_uri_help'] = 'L\'URL relativo completo per questa Risorsa.';
$_lang['resource_uri_override'] = 'Congela (Freeze) URI';
$_lang['resource_uri_override_help'] = 'Questa opzione ti consente di congelare l\'URI per questa Risorsa al valore mostrato nel campo di testo sotto.';
$_lang['resource_with_id_not_found'] = 'Risorsa con ID %s non trovata!';
$_lang['resource_view'] = 'Anteprima';
$_lang['show_sort_options'] = 'Mostra Opzioni Ordinamento';
$_lang['site_schedule'] = 'Programmazione';
$_lang['site_schedule_desc'] = 'Mostra fra le risorse correnti quelle  programmate per essere pubblicate o ritirate in date specifiche. Puoi attivare/disattivare la visualizzazione corrente cliccando sul pulsante nella Barra strumenti.';
$_lang['source'] = 'Sorgente';
$_lang['static_resource'] = 'Risorsa Statica';
$_lang['static_resource_create_here'] = 'Risorsa Statica';
$_lang['static_resource_new'] = 'Nuova Risorsa Statica';
$_lang['status'] = 'Status';
$_lang['symlink'] = 'Symlink';
$_lang['symlink_create'] = 'Crea Symlink';
$_lang['symlink_create_here'] = 'Symlink';
$_lang['symlink_help'] = 'L\'indirizzo dell\'oggetto a cui vorresti fare riferimento con questo Symlink. Se vuoi che punti a una Risorsa di MODX esistente, inserisci qui il suo ID.';
$_lang['symlink_message'] = 'Un symlink è un link simbolico ad un\'altra risorsa nel sito alla quale è trasmesso senza cambiare l\'URL.';
$_lang['symlink_new'] = 'Nuovo Symlink';
$_lang['template_variables'] = 'Variabili di Template (TV)';
$_lang['untitled_resource'] = 'Risorsa senza titolo';
$_lang['weblink'] = 'Weblink';
$_lang['weblink_create'] = 'Crea Weblink';
$_lang['weblink_create_here'] = 'Weblink';
$_lang['weblink_help'] = 'L\'indirizzo dell\'oggetto al quale vorresti riferirti con questo weblink. Se vuoi che punti a una Risorsa di MODX esistente, inserisci qui il suo ID.';
$_lang['weblink_message'] = 'Un weblink è un riferimento ad un oggetto in internet. Potrebbe essere un documento in MODX, una pagina in un altro sito o un\'immagine o un altro tipo di file internet.<p>';
$_lang['weblink_new'] = 'Nuovo Weblink';
$_lang['weblink_response_code'] = 'Codice Risposta';
$_lang['weblink_response_code_help'] = 'Il codice HTTP di risposta che dovrebbe essere inviato per il weblink.';
