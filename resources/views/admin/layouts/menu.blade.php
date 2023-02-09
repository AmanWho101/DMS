
<li class="{{ Request::is('admin/search/searches*') ? 'active' : '' }}">
    <a href="{!! route('admin.search.searches.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="globe" data-size="18"
               data-loop="true"></i>
               Searches
    </a>
</li>

<li class="{{ Request::is('admin/document/documents*') ? 'active' : '' }}">
    <a href="{!! route('admin.document.documents.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="list" data-size="18"
               data-loop="true"></i>
               Document
    </a>
</li>



