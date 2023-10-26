<% if $Title && $ShowTitle %><h2 class="element__title">$Title</h2><% end_if %>

<div class="row row-gap-4" id="gallery-{$ID}" data-bs-toggle="modal" data-bs-target="#galleryModal-{$ID}">
    <% if $Images %>
        <% loop $Images.Sort('SortOrder') %>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <img src="{$Image.Fill(576,576).URL}" class="img-fluid" data-bs-target="#carousel-gallery-{$Up.ID}" data-bs-slide-to="{$Pos(0)}">
            </div>
        <% end_loop %>
    <% end_if %>
</div>

<div class="modal fade" id="galleryModal-{$ID}" tabindex="-1" aria-labelledby="galleryModal-{$ID}Label" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 p-3 z-2" data-bs-dismiss="modal" aria-label="Close"></button>
                <div id="carousel-gallery-{$ID}" class="carousel slide">
                    <div class="carousel-indicators">
                        <% loop $Images.Sort('SortOrder') %>
                            <button type="button" data-bs-target="#carousel-gallery-{$Up.ID}" data-bs-slide-to="{$Pos(0)}"  <% if $IsFirst %>class="active" aria-current="true"<% end_if %> aria-label="{$Title.XML}"></button>
                        <% end_loop %>
                    </div>
                    <div class="carousel-inner">
                        <% loop $Images.Sort('SortOrder') %>
                            <div class="carousel-item <% if $IsFirst %> active<% end_if %>">
                                <div class="ratio ratio-16x9 bg-black">
                                    <img src="$Image.URL" alt="$Image.Title.XML" class="d-block mw-100 mh-100 h-auto w-auto m-auto top-0 end-0 bottom-0 start-0 img-fluid">
                                </div>
                            
                                <div class="carousel-caption d-none d-lg-block text-white text-center">
                                    <% if $Title && $ShowTitle %><h3>$Title</h3><% end_if %>
                                    <% if $Content %>
                                        <div class="m-0 p-2 small">$Content</div>
                                    <% end_if %>
                                </div>
                            </div>
                        <% end_loop %>
                    </div>
                    <% if $Images.Count > 1 %>
                        <button class="carousel-control-prev h-75 m-auto" type="button" data-bs-target="#carousel-gallery-{$ID}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next h-75 m-auto" type="button" data-bs-target="#carousel-gallery-{$ID}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    <% end_if %>
                </div>
            </div>
        </div>
    </div>
</div>