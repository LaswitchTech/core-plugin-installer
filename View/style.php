<style>
    :root {
        --success: #4CAF50;
        --danger: #f44336;
        --warning: #ff9800;
        --info: #00BCD4;
        --primary: #2196F3;
        --secondary: #555555;
        --white: #ffffff;
        --light: #f2f2f2;
        --light-gray: #eeeeee;
        --gray: #cccccc;
        --dark-gray: #666666;
        --dark: #333333;
        --black: #000000;
        --font-size: 0.8rem;
        --border-radius: 4px;
        --border-color: #333333;
        --border-color-alt: #cccccc;
        --margin: 0.8rem;
        --padding: 0.8rem;
    }
    body {
        margin: 0;
        padding: 0;
        background-color: var(--light);
        color: var(--dark);
        font-family: monospace;
        font-size: var(--font-size);
        text-wrap-mode: nowrap;
        user-select: none;
        width: 100vw;
        height: 100vh;
    }
    body * {
        transition: all 0.3s ease-in-out;
    }
    h1, h2, h3, h4, h5, h6 {
        margin: 0 0 1rem;
    }
    h1 {
        font-size: calc(var(--font-size) * 5);
    }
    h2 {
        font-size: calc(var(--font-size) * 4);
    }
    h3 {
        font-size: calc(var(--font-size) * 3);
    }
    h4 {
        font-size: calc(var(--font-size) * 2);
    }
    h5 {
        font-size: var(--font-size);
    }
    pre {
        white-space: pre;
        word-wrap: break-word;
        font-family: monospace;
        font-size: var(--font-size);
    }
    p {
        font-size: var(--font-size);
        margin: 0 0 2rem;
    }
    a, a:visited, button {
        background: var(--dark);
        color: var(--white);
        padding: 12px 20px;
        text-decoration: none;
        font-family: monospace;
        text-wrap-mode: nowrap;
        border-radius: var(--border-radius);
        border-width: 0px;
        cursor: pointer;
        font-size: var(--font-size);
    }
    a:hover, a.active, button:hover, button.active  {
        background: var(--dark-gray);
    }
    a:focus, button:focus, input:focus {
        outline: none;
        box-shadow: 0 0 0 6px rgba(0, 0, 255, 0.25);
        z-index: 100;
    }
    .d-flex { display: flex; }
    .d-block { display: block; }
    .d-inline { display: inline; }
    .d-inline-block { display: inline-block; }
    .d-none { display: none !important; }
    .flex-row {
        flex-direction: row !important;
    }
    .flex-column {
        flex-direction: column !important;
    }
    .flex-grow {
        flex-grow: 1 !important;
    }
    .flex-shrink {
        flex-shrink: 1 !important;
    }
    .justify-content-center {
        justify-content: center !important;
    }
    .align-items-center {
        align-items: center !important;
    }
    .btn-group {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
    }
    .btn-group a, .btn-group button {
        margin-top: 0px;
        margin-left: 0px;
        margin-right: 0px;
        border-radius: 0px;
    }
    .btn-group a:first-child, .btn-group button:first-child {
        border-top-left-radius: var(--border-radius);
        border-bottom-left-radius: var(--border-radius);
    }
    .btn-group a:last-child, .btn-group button:last-child {
        border-top-right-radius: var(--border-radius);
        border-bottom-right-radius: var(--border-radius);
    }
    div.form-group {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    div.form-group input {
        padding: 12px 20px;
        text-decoration: none;
        font-family: monospace;
        text-wrap-mode: nowrap;
        white-space-collapse: preserve;
        border: none;
        height: 26px;
        outline: none;
        background: transparent;
        color: var(--dark);
    }
    div.form-group select{
        height: 50px;
        padding: 12px 10px;
        background: #fff;
        cursor: pointer;
        outline: none;
        border: none;
    }
    div.form-group input[type="checkbox"] {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        width: 20px;
        height: 16px;
        border: 2px solid var(--border-color);
        border-radius: var(--border-radius);
        padding: 4px;
        background: var(--white);
        cursor: pointer;
        outline: none;
        position: relative;
    }
    div.form-group input[type="checkbox"]:focus {
        border: 2px solid var(--border-color) !important;
    }
    div.form-group input[type="checkbox"]:checked {
        background: var(--dark);
    }
    div.form-group input[type="checkbox"]:checked::after {
        content: "";
        position: absolute;
        top: 0px;
        left: 4px;
        width: 6px;
        height: 12px;
        border: solid var(--white);
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }
    div.form-group .input {
        border-width: 3px;
        border-color: var(--border-color);
        border-style: solid;
        border-radius: 0px;
        border-top-width: 1px;
        border-bottom-width: 0px;
        background-color: var(--white);
        width: 400px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }
    div.form-group .input input, div.form-group .input select {
        flex-grow: 1;
    }
    div.form-group .input label {
        flex-shrink: 1;
    }
    div.form-group .input:has(select) {
        padding: 0px 10px;
        width: 380px;
    }
    div.form-group .input:has(input[type="checkbox"]) {
        flex-direction: row-reverse;
        padding: 12px 20px;
        width: 360px;
        cursor: pointer;
    }
    div.form-group .input:has(input[type="checkbox"]) input {
        flex-grow: 0;
        flex-shrink: 1;
        height: 20px;
        cursor: pointer;
    }
    div.form-group .input:has(input[type="checkbox"]) label {
        flex-grow: 1;
        flex-shrink: 0;
        cursor: pointer;
    }
    div.form-group .input.error input {
        background-color: rgba(255, 0, 0, 0.50);
        box-shadow: 0 0 0 6px rgba(255, 0, 0, 0.25);
        z-index: 100;
        color: var(--white);
    }
    div.form-group .input:has(input:focus) {
        border-color: var(--primary);
    }
    div.form-group .input:has(input:focus) input {
        border: none;
    }
    div.form-group div.input-wrapper div.input:first-of-type {
        border-top-left-radius: var(--border-radius);
        border-top-right-radius: var(--border-radius);
        border-top-width: 3px;
    }
    div.form-group div.input-wrapper div.input:last-of-type {
        border-bottom-left-radius: var(--border-radius);
        border-bottom-right-radius: var(--border-radius);
        border-bottom-width: 3px;
    }
    div.form-group > label {
        font-size: var(--font-size);
        margin-bottom: 0.5rem;
    }
    .row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        width: 100%;
        box-sizing: border-box;
    }
    .row > .col {}
    .row > .col:last-child:nth-child(2n+1) {
        grid-column: 1 / -1;
    }
    div.container-group {}
    div.container-group > * {
        background-color: var(--white);
        padding: 12px 20px;
        text-decoration: none;
        font-family: monospace;
        text-wrap-mode: nowrap;
        border-radius: 0px;
        border-width: 3px;
        border-top-width: 1px;
        border-bottom-width: 0px;
        border-color: var(--border-color);
        border-style: solid;
        min-width: 400px;
        text-align: left;
    }
    div.container-group > *:first-child {
        border-top-left-radius: var(--border-radius);
        border-top-right-radius: var(--border-radius);
        border-top-width: 3px;
    }
    div.container-group > *:last-child {
        border-bottom-left-radius: var(--border-radius);
        border-bottom-right-radius: var(--border-radius);
        border-bottom-width: 3px;
    }
    div.container-group > label {
        background-color: var(--dark);
        color: var(--white);
        text-align: center;
        display:block;
        cursor: pointer;
    }
    div.container-group > label:hover {
        background: var(--dark-gray);
    }
    .collapse {
        max-height: 0;
        overflow: hidden;
        transition: max-height 1s ease-in-out;
    }
    .collapse.show {
        max-height: 1000px;
    }
    .float-end {
        float: right;
    }
    .float-start {
        float: left;
    }
    @keyframes spin {
        100% {
            transform: rotate(360deg);
        }
    }
    .text-center {
        text-align: center !important;
    }
    .w-100 { width: 100% !important; }
    .h-100 { height: 100% !important; }
    .max-vw-50 { max-width: 50vw !important; }
    .max-vh-50 { max-height: 50vh !important; }
    .vw-50 { width: 50vw !important; }
    .vw-100 { width: 100vw !important; }
    .vh-50 { height: 50vh !important; }
    .vh-100 { height: 100vh !important; }
    .m-0 { margin: 0 !important; }
    .m-1 { margin: var(--margin) !important; }
    .m-2 { margin: calc(var(--margin) * 2) !important; }
    .m-3 { margin: calc(var(--margin) * 3) !important; }
    .m-4 { margin: calc(var(--margin) * 4) !important; }
    .m-5 { margin: calc(var(--margin) * 5) !important; }
    .p-0 { padding: 0 !important; }
    .p-1 { padding: var(--padding) !important; }
    .p-2 { padding: calc(var(--padding) * 2) !important; }
    .p-3 { padding: calc(var(--padding) * 3) !important; }
    .p-4 { padding: calc(var(--padding) * 4) !important; }
    .p-5 { padding: calc(var(--padding) * 5) !important; }
    .overflow-auto { overflow: auto !important; }
    .overflow-hidden { overflow: hidden !important; }
    .overflow-scroll { overflow: scroll !important; }
    .spinner {
        width: 40px;
        height: 40px;
        border: 4px solid var(--border-color-alt);
        border-radius: 50%;
        text-align: center;
        vertical-align: middle;
        font-size: 1.25rem;
        line-height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: row;
    }
    .spinner.spinner-25, .spinner.spinner-50, .spinner.spinner-75 {
        animation: spin 0.8s linear infinite;
    }
    .spinner.spinner-25 {
        border-top-color: var(--border-color);
    }
    .spinner.spinner-50 {
        border-top-color: var(--border-color);
        border-right-color: var(--border-color);
    }
    .spinner.spinner-75 {
        border-top-color: var(--border-color);
        border-right-color: var(--border-color);
        border-bottom-color: var(--border-color);
    }
    .spinner.spinner-100 {
        border: 4px solid var(--border-color);
    }
    .spinner.success { --border-color: var(--success); }
    .spinner.danger { --border-color: var(--danger); }
    .spinner.warning { --border-color: var(--warning); }
    .spinner.info { --border-color: var(--info); }
    .spinner.primary { --border-color: var(--primary); }
    .spinner.secondary { --border-color: var(--secondary); }
    .spinner.white { --border-color: var(--white); }
    .spinner.light { --border-color: var(--light); }
    .spinner.light-gray { --border-color: var(--light-gray); }
    .spinner.gray { --border-color: var(--gray); }
    .spinner.dark-gray { --border-color: var(--dark-gray); }
    .spinner.dark { --border-color: var(--dark); }
    .spinner.black { --border-color: var(--black); }
    .collapse .btn-group {
        margin-top: 1rem;
        margin-bottom: 1rem;
    }
    .text-success { color: var(--success); }
    .text-danger { color: var(--danger); }
    .text-warning { color: var(--warning); }
    .text-info { color: var(--info); }
    .text-primary { color: var(--primary); }
    .text-secondary { color: var(--secondary); }
    .text-white { color: var(--white); }
    .text-light { color: var(--light); }
    .text-gray { color: var(--gray); }
    .text-light-gray { color: var(--light-gray); }
    .text-dark-gray { color: var(--dark-gray); }
    .text-dark { color: var(--dark); }
    .text-black { color: var(--black); }
    i {
        width: 32px;
        height: 32px;
        background-size: cover;
    }
    i.check {
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'><path d='M5 13L9 17L19 7' stroke='%23333333' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.check.success {
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'><path d='M5 13L9 17L19 7' stroke='%234CAF50' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.check.danger {
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'><path d='M5 13L9 17L19 7' stroke='%23f44336' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.check.warning {
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'><path d='M5 13L9 17L19 7' stroke='%23ff9800' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.check.info {
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'><path d='M5 13L9 17L19 7' stroke='%2300BCD4' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.check.primary {
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'><path d='M5 13L9 17L19 7' stroke='%232196F3' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.check.secondary {
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'><path d='M5 13L9 17L19 7' stroke='%23555555' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.check.white {
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'><path d='M5 13L9 17L19 7' stroke='%23ffffff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.check.light {
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'><path d='M5 13L9 17L19 7' stroke='%23f2f2f2' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.check.light-gray {
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'><path d='M5 13L9 17L19 7' stroke='%23cccccc' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.check.gray {
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'><path d='M5 13L9 17L19 7' stroke='%23cccccc' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.check.dark-gray {
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'><path d='M5 13L9 17L19 7' stroke='%23666666' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.check.dark {
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'><path d='M5 13L9 17L19 7' stroke='%23333333' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.check.black {
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'><path d='M5 13L9 17L19 7' stroke='%23000000' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.x {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M6 6L18 18' stroke='%23333333' stroke-width='2' stroke-linecap='round'/><path d='M6 18L18 6' stroke='%23333333' stroke-width='2' stroke-linecap='round'/></svg>");
    }
    i.x.success {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M6 6L18 18' stroke='%234CAF50' stroke-width='2' stroke-linecap='round'/><path d='M6 18L18 6' stroke='%234CAF50' stroke-width='2' stroke-linecap='round'/></svg>");
    }
    i.x.danger {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M6 6L18 18' stroke='%23f44336' stroke-width='2' stroke-linecap='round'/><path d='M6 18L18 6' stroke='%23f44336' stroke-width='2' stroke-linecap='round'/></svg>");
    }
    i.x.warning {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M6 6L18 18' stroke='%23ff9800' stroke-width='2' stroke-linecap='round'/><path d='M6 18L18 6' stroke='%23ff9800' stroke-width='2' stroke-linecap='round'/></svg>");
    }
    i.x.info {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M6 6L18 18' stroke='%2300BCD4' stroke-width='2' stroke-linecap='round'/><path d='M6 18L18 6' stroke='%2300BCD4' stroke-width='2' stroke-linecap='round'/></svg>");
    }
    i.x.primary {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M6 6L18 18' stroke='%232196F3' stroke-width='2' stroke-linecap='round'/><path d='M6 18L18 6' stroke='%232196F3' stroke-width='2' stroke-linecap='round'/></svg>");
    }
    i.x.secondary {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M6 6L18 18' stroke='%23555555' stroke-width='2' stroke-linecap='round'/><path d='M6 18L18 6' stroke='%23555555' stroke-width='2' stroke-linecap='round'/></svg>");
    }
    i.x.white {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M6 6L18 18' stroke='%23ffffff' stroke-width='2' stroke-linecap='round'/><path d='M6 18L18 6' stroke='%23ffffff' stroke-width='2' stroke-linecap='round'/></svg>");
    }
    i.x.light {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M6 6L18 18' stroke='%23f2f2f2' stroke-width='2' stroke-linecap='round'/><path d='M6 18L18 6' stroke='%23f2f2f2' stroke-width='2' stroke-linecap='round'/></svg>");
    }
    i.x.light-gray {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M6 6L18 18' stroke='%23cccccc' stroke-width='2' stroke-linecap='round'/><path d='M6 18L18 6' stroke='%23cccccc' stroke-width='2' stroke-linecap='round'/></svg>");
    }
    i.x.gray {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M6 6L18 18' stroke='%23cccccc' stroke-width='2' stroke-linecap='round'/><path d='M6 18L18 6' stroke='%23cccccc' stroke-width='2' stroke-linecap='round'/></svg>");
    }
    i.x.dark-gray {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M6 6L18 18' stroke='%23666666' stroke-width='2' stroke-linecap='round'/><path d='M6 18L18 6' stroke='%23666666' stroke-width='2' stroke-linecap='round'/></svg>");
    }
    i.x.dark {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M6 6L18 18' stroke='%23333333' stroke-width='2' stroke-linecap='round'/><path d='M6 18L18 6' stroke='%23333333' stroke-width='2' stroke-linecap='round'/></svg>");
    }
    i.x.black {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M6 6L18 18' stroke='%23000000' stroke-width='2' stroke-linecap='round'/><path d='M6 18L18 6' stroke='%23000000' stroke-width='2' stroke-linecap='round'/></svg>");
    }
    i.exclamation {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><line x1='12' y1='4' x2='12' y2='16' stroke='%23333333' stroke-width='2' stroke-linecap='round'/><circle cx='12' cy='20' r='1.5' fill='%23333333'/></svg>");
    }
    i.exclamation.success {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><line x1='12' y1='4' x2='12' y2='16' stroke='%234CAF50' stroke-width='2' stroke-linecap='round'/><circle cx='12' cy='20' r='1.5' fill='%234CAF50'/></svg>");
    }
    i.exclamation.danger {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><line x1='12' y1='4' x2='12' y2='16' stroke='%23f44336' stroke-width='2' stroke-linecap='round'/><circle cx='12' cy='20' r='1.5' fill='%23f44336'/></svg>");
    }
    i.exclamation.warning {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><line x1='12' y1='4' x2='12' y2='16' stroke='%23ff9800' stroke-width='2' stroke-linecap='round'/><circle cx='12' cy='20' r='1.5' fill='%23ff9800'/></svg>");
    }
    i.exclamation.info {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><line x1='12' y1='4' x2='12' y2='16' stroke='%2300BCD4' stroke-width='2' stroke-linecap='round'/><circle cx='12' cy='20' r='1.5' fill='%2300BCD4'/></svg>");
    }
    i.exclamation.primary {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><line x1='12' y1='4' x2='12' y2='16' stroke='%232196F3' stroke-width='2' stroke-linecap='round'/><circle cx='12' cy='20' r='1.5' fill='%232196F3'/></svg>");
    }
    i.exclamation.secondary {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><line x1='12' y1='4' x2='12' y2='16' stroke='%23555555' stroke-width='2' stroke-linecap='round'/><circle cx='12' cy='20' r='1.5' fill='%23555555'/></svg>");
    }
    i.exclamation.white {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><line x1='12' y1='4' x2='12' y2='16' stroke='%23ffffff' stroke-width='2' stroke-linecap='round'/><circle cx='12' cy='20' r='1.5' fill='%23ffffff'/></svg>");
    }
    i.exclamation.light {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><line x1='12' y1='4' x2='12' y2='16' stroke='%23f2f2f2' stroke-width='2' stroke-linecap='round'/><circle cx='12' cy='20' r='1.5' fill='%23f2f2f2'/></svg>");
    }
    i.exclamation.light-gray {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><line x1='12' y1='4' x2='12' y2='16' stroke='%23cccccc' stroke-width='2' stroke-linecap='round'/><circle cx='12' cy='20' r='1.5' fill='%23cccccc'/></svg>");
    }
    i.exclamation.gray {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><line x1='12' y1='4' x2='12' y2='16' stroke='%23cccccc' stroke-width='2' stroke-linecap='round'/><circle cx='12' cy='20' r='1.5' fill='%23cccccc'/></svg>");
    }
    i.exclamation.dark-gray {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><line x1='12' y1='4' x2='12' y2='16' stroke='%23666666' stroke-width='2' stroke-linecap='round'/><circle cx='12' cy='20' r='1.5' fill='%23666666'/></svg>");
    }
    i.exclamation.dark {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><line x1='12' y1='4' x2='12' y2='16' stroke='%23333333' stroke-width='2' stroke-linecap='round'/><circle cx='12' cy='20' r='1.5' fill='%23333333'/></svg>");
    }
    i.exclamation.black {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><line x1='12' y1='4' x2='12' y2='16' stroke='%23000000' stroke-width='2' stroke-linecap='round'/><circle cx='12' cy='20' r='1.5' fill='%23000000'/></svg>");
    }
    i.question {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 18H12.01' stroke='%23333333' stroke-width='2' stroke-linecap='round'/><path d='M12 14C12 11 16 11 16 7.5C16 5.01472 13.9853 3 11.5 3C9.01472 3 7 5.01472 7 7' stroke='%23333333' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.question.success {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 18H12.01' stroke='%234CAF50' stroke-width='2' stroke-linecap='round'/><path d='M12 14C12 11 16 11 16 7.5C16 5.01472 13.9853 3 11.5 3C9.01472 3 7 5.01472 7 7' stroke='%234CAF50' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.question.danger {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 18H12.01' stroke='%23f44336' stroke-width='2' stroke-linecap='round'/><path d='M12 14C12 11 16 11 16 7.5C16 5.01472 13.9853 3 11.5 3C9.01472 3 7 5.01472 7 7' stroke='%23f44336' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.question.warning {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 18H12.01' stroke='%23ff9800' stroke-width='2' stroke-linecap='round'/><path d='M12 14C12 11 16 11 16 7.5C16 5.01472 13.9853 3 11.5 3C9.01472 3 7 5.01472 7 7' stroke='%23ff9800' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.question.info {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 18H12.01' stroke='%2300BCD4' stroke-width='2' stroke-linecap='round'/><path d='M12 14C12 11 16 11 16 7.5C16 5.01472 13.9853 3 11.5 3C9.01472 3 7 5.01472 7 7' stroke='%2300BCD4' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.question.primary {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 18H12.01' stroke='%232196F3' stroke-width='2' stroke-linecap='round'/><path d='M12 14C12 11 16 11 16 7.5C16 5.01472 13.9853 3 11.5 3C9.01472 3 7 5.01472 7 7' stroke='%232196F3' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.question.secondary {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 18H12.01' stroke='%23555555' stroke-width='2' stroke-linecap='round'/><path d='M12 14C12 11 16 11 16 7.5C16 5.01472 13.9853 3 11.5 3C9.01472 3 7 5.01472 7 7' stroke='%23555555' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.question.white {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 18H12.01' stroke='%23ffffff' stroke-width='2' stroke-linecap='round'/><path d='M12 14C12 11 16 11 16 7.5C16 5.01472 13.9853 3 11.5 3C9.01472 3 7 5.01472 7 7' stroke='%23ffffff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.question.light {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 18H12.01' stroke='%23f2f2f2' stroke-width='2' stroke-linecap='round'/><path d='M12 14C12 11 16 11 16 7.5C16 5.01472 13.9853 3 11.5 3C9.01472 3 7 5.01472 7 7' stroke='%23f2f2f2' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.question.light-gray {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 18H12.01' stroke='%23cccccc' stroke-width='2' stroke-linecap='round'/><path d='M12 14C12 11 16 11 16 7.5C16 5.01472 13.9853 3 11.5 3C9.01472 3 7 5.01472 7 7' stroke='%23cccccc' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.question.gray {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 18H12.01' stroke='%23cccccc' stroke-width='2' stroke-linecap='round'/><path d='M12 14C12 11 16 11 16 7.5C16 5.01472 13.9853 3 11.5 3C9.01472 3 7 5.01472 7 7' stroke='%23cccccc' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.question.dark-gray {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 18H12.01' stroke='%23666666' stroke-width='2' stroke-linecap='round'/><path d='M12 14C12 11 16 11 16 7.5C16 5.01472 13.9853 3 11.5 3C9.01472 3 7 5.01472 7 7' stroke='%23666666' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.question.dark {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 18H12.01' stroke='%23333333' stroke-width='2' stroke-linecap='round'/><path d='M12 14C12 11 16 11 16 7.5C16 5.01472 13.9853 3 11.5 3C9.01472 3 7 5.01472 7 7' stroke='%23333333' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.question.black {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 18H12.01' stroke='%23000000' stroke-width='2' stroke-linecap='round'/><path d='M12 14C12 11 16 11 16 7.5C16 5.01472 13.9853 3 11.5 3C9.01472 3 7 5.01472 7 7' stroke='%23000000' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    }
    i.dots {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><circle cx='5' cy='12' r='2' fill='%23333333'/><circle cx='12' cy='12' r='2' fill='%23333333'/><circle cx='19' cy='12' r='2' fill='%23333333'/></svg>");
    }
    i.dots.success {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><circle cx='5' cy='12' r='2' fill='%234CAF50'/><circle cx='12' cy='12' r='2' fill='%234CAF50'/><circle cx='19' cy='12' r='2' fill='%234CAF50'/></svg>");
    }
    i.dots.danger {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><circle cx='5' cy='12' r='2' fill='%23f44336'/><circle cx='12' cy='12' r='2' fill='%23f44336'/><circle cx='19' cy='12' r='2' fill='%23f44336'/></svg>");
    }
    i.dots.warning {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><circle cx='5' cy='12' r='2' fill='%23ff9800'/><circle cx='12' cy='12' r='2' fill='%23ff9800'/><circle cx='19' cy='12' r='2' fill='%23ff9800'/></svg>");
    }
    i.dots.info {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><circle cx='5' cy='12' r='2' fill='%2300BCD4'/><circle cx='12' cy='12' r='2' fill='%2300BCD4'/><circle cx='19' cy='12' r='2' fill='%2300BCD4'/></svg>");
    }
    i.dots.primary {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><circle cx='5' cy='12' r='2' fill='%232196F3'/><circle cx='12' cy='12' r='2' fill='%232196F3'/><circle cx='19' cy='12' r='2' fill='%232196F3'/></svg>");
    }
    i.dots.secondary {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><circle cx='5' cy='12' r='2' fill='%23555555'/><circle cx='12' cy='12' r='2' fill='%23555555'/><circle cx='19' cy='12' r='2' fill='%23555555'/></svg>");
    }
    i.dots.white {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><circle cx='5' cy='12' r='2' fill='%23ffffff'/><circle cx='12' cy='12' r='2' fill='%23ffffff'/><circle cx='19' cy='12' r='2' fill='%23ffffff'/></svg>");
    }
    i.dots.light {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><circle cx='5' cy='12' r='2' fill='%23f2f2f2'/><circle cx='12' cy='12' r='2' fill='%23f2f2f2'/><circle cx='19' cy='12' r='2' fill='%23f2f2f2'/></svg>");
    }
    i.dots.light-gray {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><circle cx='5' cy='12' r='2' fill='%23cccccc'/><circle cx='12' cy='12' r='2' fill='%23cccccc'/><circle cx='19' cy='12' r='2' fill='%23cccccc'/></svg>");
    }
    i.dots.gray {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><circle cx='5' cy='12' r='2' fill='%23cccccc'/><circle cx='12' cy='12' r='2' fill='%23cccccc'/><circle cx='19' cy='12' r='2' fill='%23cccccc'/></svg>");
    }
    i.dots.dark-gray {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><circle cx='5' cy='12' r='2' fill='%23666666'/><circle cx='12' cy='12' r='2' fill='%23666666'/><circle cx='19' cy='12' r='2' fill='%23666666'/></svg>");
    }
    i.dots.dark {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><circle cx='5' cy='12' r='2' fill='%23333333'/><circle cx='12' cy='12' r='2' fill='%23333333'/><circle cx='19' cy='12' r='2' fill='%23333333'/></svg>");
    }
    i.dots.black {
        background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><circle cx='5' cy='12' r='2' fill='%23000000'/><circle cx='12' cy='12' r='2' fill='%23000000'/><circle cx='19' cy='12' r='2' fill='%23000000'/></svg>");
    }
    .bg-success { background-color: var(--success); }
    .bg-danger { background-color: var(--danger); }
    .bg-warning { background-color: var(--warning); }
    .bg-info { background-color: var(--info); }
    .bg-primary { background-color: var(--primary); }
    .bg-secondary { background-color: var(--secondary); }
    .bg-white { background-color: var(--white); }
    .bg-light { background-color: var(--light); }
    .bg-light-gray { background-color: var(--light-gray); }
    .bg-gray { background-color: var(--gray); }
    .bg-dark-gray { background-color: var(--dark-gray); }
    .bg-dark { background-color: var(--dark); }
    .bg-black { background-color: var(--black); }
    .box {
        position: fixed;
        top: 1rem;
        left: calc(50% - 25vw - 20px);
    }
    .box pre {
        padding: 20px;
        width: 50vw;
        position: relative;
    }
    .box pre .close {
        position: absolute;
        top: 8px;
        right: 8px;
        cursor: pointer;
        width: 24px;
        height: 24px;
    }
    .rounded { border-radius: var(--border-radius); }
    .rounded-0 { border-radius: 0; }
    .rounded-1 { border-radius: var(--border-radius); }
    .rounded-2 { border-radius: calc(var(--border-radius) * 2); }
    .rounded-3 { border-radius: calc(var(--border-radius) * 3); }
    .rounded-4 { border-radius: calc(var(--border-radius) * 4); }
    .rounded-5 { border-radius: calc(var(--border-radius) * 5); }
    .rounded-circle { border-radius: 50%; }
    .opacity-0 { opacity: 0%; }
    .opacity-25 { opacity: 25%; }
    .opacity-50 { opacity: 50%; }
    .opacity-75 { opacity: 75%; }
    .opacity-100 { opacity: 100%; }
</style>
