<style>
*,
*::before,
*::after {
  box-sizing: border-box; }

html {
  font-family: sans-serif;
  line-height: 1.15;
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%;
  -ms-overflow-style: scrollbar;
  -webkit-tap-highlight-color: transparent; }

@-ms-viewport {
  width: device-width; }

article, aside, dialog, figcaption, figure, footer, header, hgroup, main, nav, section {
  display: block; }
  .container {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto; }
  @media (min-width: 576px) {
    .container {
      max-width: 540px; } }
  @media (min-width: 768px) {
    .container {
      max-width: 720px; } }
  @media (min-width: 992px) {
    .container {
      max-width: 960px; } }
  @media (min-width: 1200px) {
    .container {
      max-width: 1140px; } }
      .card h5.card-title,
  .card h6.card-title {
    font-size: 1.5rem;
    font-weight: 300; }
    h1, h2, h3, h4, h5, h6 {
  margin-top: 0;
  margin-bottom: 0.5rem; }
.page-break{
    page-break-after: always;
}
body {
  margin: 0;
  font-family: "Roboto", "Helvetica", "Arial", sans-serif;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #212529;
  text-align: left;
  background-color: #fafafa; }

[tabindex="-1"]:focus {
  outline: 0 !important; }

hr {
  box-sizing: content-box;
  height: 0;
  overflow: visible; }

h1, h2, h3, h4, h5, h6 {
  margin-top: 0;
  margin-bottom: 0.5rem; }
  h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6 {
  margin-bottom: 0.5rem;
  font-family: inherit;
  font-weight: 400;
  line-height: 1.2;
  color: inherit; }
  h5, .h5 {
  font-size: 1.25rem; }

.text-muted, .bmd-help {
  color: #6c757d !important; }
  .container-fluid {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto; }
  .border {
  border: 1px solid #dee2e6 !important; }

p {
  margin-top: 0;
  margin-bottom: 1rem; }

abbr[title],
abbr[data-original-title] {
  text-decoration: underline;
  text-decoration: underline dotted;
  cursor: help;
  border-bottom: 0; }

address {
  margin-bottom: 1rem;
  font-style: normal;
  line-height: inherit; }

ol,
ul,
dl {
  margin-top: 0;
  margin-bottom: 1rem; }

ol ol,
ul ul,
ol ul,
ul ol {
  margin-bottom: 0; }

dt {
  font-weight: 700; }

dd {
  margin-bottom: .5rem;
  margin-left: 0; }

blockquote {
  margin: 0 0 1rem; }

dfn {
  font-style: italic; }

b,
strong {
  font-weight: bolder; }

small {
  font-size: 80%; }

sub,
sup {
  position: relative;
  font-size: 75%;
  line-height: 0;
  vertical-align: baseline; }

sub {
  bottom: -.25em; }

sup {
  top: -.5em; }

a {
  color: #009688;
  text-decoration: none;
  background-color: transparent;
  -webkit-text-decoration-skip: objects; }
  a:hover {
    color: #004a43;
    text-decoration: underline; }

a:not([href]):not([tabindex]) {
  color: inherit;
  text-decoration: none; }
  a:not([href]):not([tabindex]):hover, a:not([href]):not([tabindex]):focus {
    color: inherit;
    text-decoration: none; }
  a:not([href]):not([tabindex]):focus {
    outline: 0; }

p

svg:not(:root) {
  overflow: hidden; }

.card {
  font-size: .875rem;
  font-weight: normal; }

    table {
        border-collapse: collapse;
    }

    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid rgba(0, 0, 0, 0.06);
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid rgba(0, 0, 0, 0.06);
    }

    .table tbody + tbody {
        border-top: 2px solid rgba(0, 0, 0, 0.06);
    }

    .table .table {
        background-color: #fafafa;
    }

    .table-sm th,
    .table-sm td {
        padding: 0.3rem;
    }

    .table-bordered {
        border: 1px solid rgba(0, 0, 0, 0.06);
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid rgba(0, 0, 0, 0.06);
    }

    .table-bordered thead th,
    .table-bordered thead td {
        border-bottom-width: 2px;
    }
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.12);
        border-radius: 0.125rem; }
    .card > hr {
        margin-right: 0;
        margin-left: 0; }
    .card > .list-group:first-child .list-group-item:first-child {
        border-top-left-radius: 0.125rem;
        border-top-right-radius: 0.125rem; }
    .card > .list-group:last-child .list-group-item:last-child {
        border-bottom-right-radius: 0.125rem;
        border-bottom-left-radius: 0.125rem; }

    .card-body {
        flex: 1 1 auto;
        padding: 1.25rem; }

    .card-title {
        margin-bottom: 0.75rem; }
    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.12); }
    .card-header:first-child {
        border-radius: calc(0.125rem - 1px) calc(0.125rem - 1px) 0 0; }
    .card-header + .list-group .list-group-item:first-child {
        border-top: 0; }
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px; }
    .col-md-8{
        position: relative;
        width: 100%;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px; }
    .col-md-8 {
        flex: 0 0 66.66667%;
        max-width: 66.66667%; }
    .border {
        border: 1px solid #dee2e6 !important; }
    .float-right {
        float: right !important; }
    .col-md-4{
        position: relative;
        width: 100%;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px; }
    .col-md-4 {
        flex: 0 0 33.33333%;
        max-width: 33.33333%; }
    .text-center {
        text-align: center !important; }


</style>