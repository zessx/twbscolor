@bgDefault      : {{bgDefault}};
@bgHighlight    : {{bgHighlight}};
@colDefault     : {{colDefault}};
@colHighlight   : {{colHighlight}};
@dropDown       : {{dropDown}};
.ddm() when (@dropDown) {
  > li > .dropdown-menu {
      background-color: @bgDefault;
      > li {
        > a {
          color: @colDefault;
          &:hover,  &:focus {
            color: @colHighlight;
            background-color: @bgHighlight; }}
        &.divider {
          background-color: @bgHighlight;}}}
  .open .dropdown-menu > .active {
    > a, > a:hover, > a:focus {
      color: @colHighlight;
      background-color: @bgHighlight; }}}
.navbar-default {
  background-color: @bgDefault;
  border-color: @bgHighlight;
  .navbar-brand {
    color: @colDefault;
    &:hover, &:focus {
      color: @colHighlight; }}
  .navbar-text {
    color: @colDefault; }
  .navbar-nav {
    > li {
      > a {
        color: @colDefault;
        &:hover,  &:focus {
          color: @colHighlight; }}}
    .ddm;
    > .active {
      > a, > a:hover, > a:focus {
        color: @colHighlight;
        background-color: @bgHighlight; }}
    > .open {
      > a, > a:hover, > a:focus {
        color: @colHighlight;
        background-color: @bgHighlight; }}}
  .navbar-toggle {
    border-color: @bgHighlight;
    &:hover, &:focus {
      background-color: @bgHighlight; }
    .icon-bar {
      background-color: @colDefault; }}
  .navbar-collapse,
  .navbar-form {
    border-color: @colDefault; }
  .navbar-link {
    color: @colDefault;
    &:hover {
      color: @colHighlight; }}}
@media (max-width: 767px) {
  .navbar-default .navbar-nav .open .dropdown-menu {
    > li > a {
      color: @colDefault;
      &:hover, &:focus {
        color: @colHighlight; }}
    > .active {
      > a, > a:hover, > a:focus {
        color: @colHighlight;
        background-color: @bgHighlight; }}}
}