@extends('layouts.admin')
                                   
                                    <a class="dropdown-item nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" >
                                            <i class="fa fa-power-off mr-3 ml-1"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                {{Auth::user()->id_role}}