[[$Header? ]]
<article>
    [[*content]]
	<p class="right"><a href="[[++link_contact]]?subject=[[*id]]" class="button">[[++label_moreinfo]]</a></p>

	<div class="photos">
		<div>
			[[!FileLister? &path=`[[*Media folder?]]` &hideDirectories=`1` &fileTpl=`Product Detail Photos` &showExt=`jpg`]]
		</div>
		<a href="javascript:;" class="btn-prev button">Vorig<br />voorbeeld</a>
		<a href="javascript:;" class="btn-next button">Volgend<br />voorbeeld</a>
	</div>
</article>

<aside>
    <nav>
        [[$Navigation Sub? ]]
    </nav>
    [[$Share Sidebar? ]]
</aside>
[[$Footer? ]]