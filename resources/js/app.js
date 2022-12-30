import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import * as FilePond from 'filepond';
import zh_TW from 'filepond/locale/zh-tw.js';
FilePond.setOptions(zh_TW);
window.FilePond = FilePond;