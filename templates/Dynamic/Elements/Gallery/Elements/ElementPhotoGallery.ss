<% if $Title && $ShowTitle %><h2 class="element__title">$Title</h2><% end_if %>

<div class="row" id="gallery-{$ID}" data-bs-toggle="modal" data-bs-target="#galleryModal-{$ID}">
    <% if $Images %>
        <% loop $Images.Sort('SortOrder') %>
            <div class="col-md-3">
                <img src="{$Image.Fill(576,576).URL}" class="img-fluid" data-bs-target="#carousel-gallery-{$Up.ID}" data-bs-slide-to="{$Pos(0)}">
            </div>
        <% end_loop %>
    <% end_if %>
</div>

<div class="modal fade" id="galleryModal-{$ID}" tabindex="-1" aria-labelledby="galleryModal-{$ID}Label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="galleryModal-{$ID}Label">$Title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="carousel-gallery-{$ID}" class="carousel slide mb-3">
                    <div class="carousel-indicators">
                        <% loop $Images.Sort('SortOrder') %>
                            <button type="button" data-bs-target="#carousel-gallery-{$Up.ID}" data-bs-slide-to="{$Pos(0)}"  <% if $IsFirst %>class="active" aria-current="true"<% end_if %> aria-label="{$Title.XML}"></button>
                        <% end_loop %>
                    </div>
                    <div class="carousel-inner">
                        <% loop $Images.Sort('SortOrder') %>
                            <div class="carousel-item text-center<% if $IsFirst %> active<% end_if %>">
                                <img src="$Image.URL" class="img-fluid" alt="$Image.Title.XML">
                                <div class="carousel-caption d-none d-md-block">
                                    <% if $Title && $ShowTitle %><h3>$Title</h3><% end_if %>
                                </div>
                            </div>
                        <% end_loop %>
                    </div>
                    <% if $Images.Count > 1 %>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-gallery-{$ID}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel-gallery-{$ID}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    <% end_if %>
                </div>
            </div>
            <div class="modal-footer">
                <% if $Content %>$Content<% end_if %>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
    </div>
</div>
