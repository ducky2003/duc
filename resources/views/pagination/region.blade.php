@extends('layout')
@if($paginator -> hasPage())
    <nav aria-label="Page navigation example">
    <ul class="pagination">
        @if($paginator -> onFirstPage())
        <li class="page-item disable">
        <a class="page-link" href="javascript:void(0)" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
        </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{$paginator->previousPageUrl()}}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        @endif
        @if($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{$paginator->nextPageUrl()}}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        @else

        @endif
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        
    </ul>
    </nav>
@endif
