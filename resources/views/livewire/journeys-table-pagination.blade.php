<div wire:init="init">
    @if ($loadData)
    <div id="JourneyTablePagination" wire:ignore>
        <div class="btn-toolbar" role="toolbar">
            @if($currentPage > 1)
            <div class="btn-group-sm me-2" role="group" aria-label="First group">
                <a type="button" href="/journeys/1" class="btn btn-primary">1</a>
                @if($currentPage > 2)
                <a type="button" href="/journeys/{{($currentPage-1)}}" class="btn btn-primary"><i class="fa fa-arrow-left ms-2"></i> {{($currentPage-1)}}</a>
                @endif
            </div>
            @endif

            <div class="btn-group-sm me-2" role="group" aria-label="Second group">
                <a type="button" href="/journeys/{{$currentPage}}" class="btn btn-secondary">{{$currentPage}}</a>
            </div>

            @if($currentPage < $pageCount)
            <div class="btn-group-sm" role="group" aria-label="Third group">
                @if($currentPage < ($pageCount-1))
                <a type="button" href="/journeys/{{($currentPage+1)}}" class="btn btn-info">{{($currentPage+1)}} <i class="fa fa-arrow-right ms-2"></i></a>
                @endif
                <a type="button" href="/journeys/{{$pageCount}}" class="btn btn-info">{{$pageCount}}</a>
            </div>
            @endif
        </div>

    </div>
    @else
    <div class="btn-toolbar" role="toolbar">
        <div class="btn-group-sm me-2" role="group" aria-label="Second group">
            <a type="button" href="/journeys/1" class="btn btn-secondary">1</a>
        </div>
    </div>
    @endif
</div>