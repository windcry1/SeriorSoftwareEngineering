function change_style_default() {
    let div = document.getElementById('layui-layout');
    div.className = "layui-layout layui-layout-admin";
}
function change_style_white() {
    let div = document.getElementById('layui-layout');
    div.className = "layui-layout layui-layout-admin skin-1";
}
function change_style_blue() {
    let div = document.getElementById('layui-layout');
    div.className = "layui-layout layui-layout-admin skin-2";
}
function switch_page(page_name, page_dir) {
    let page_name_div = document.getElementById('page_name');
    page_name_div.innerHTML = "<i class='layui-icon'></i>" + page_name;
    let page_dir_div = document.getElementById('iframe');
    page_dir_div.src = page_dir;
}