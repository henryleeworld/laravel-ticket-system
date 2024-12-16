import * as FilePond from 'filepond';
import axios from 'axios';
import zh_TW from 'filepond/locale/zh-tw.js';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

FilePond.setOptions(zh_TW);
window.FilePond = FilePond;
