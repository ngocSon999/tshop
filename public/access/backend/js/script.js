const ctx = document.getElementById('myChart');


new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7'],
        datasets: [{
            data: [65, 59, 80, 81, 56, 55, 40],
            label: 'Doanh thu',
            borderColor: '#0d6efd',
            fill: false
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


// JavaScript để xử lý hiển thị/ẩn sidebar trên màn hình nhỏ
const sidebar = document.getElementById('sidebar');
const content = document.querySelector('.content');
const toggleSidebarBtn = document.querySelector('.toggle-sidebar-btn');
const submenus = document.querySelectorAll('.submenu');


if (toggleSidebarBtn) {
    toggleSidebarBtn.addEventListener('click', () => {
        sidebar.classList.toggle('show');
        content.classList.toggle('shifted');
    });
}


// Chức năng đóng các submenu khác khi một submenu được mở
submenus.forEach(submenu => {
    submenu.addEventListener('show.bs.collapse', function () {
        submenus.forEach(otherSubmenu => {
            if (otherSubmenu !== submenu) {
                const bsCollapse = bootstrap.Collapse.getInstance(otherSubmenu);
                if (bsCollapse && otherSubmenu.classList.contains('show')) {
                    bsCollapse.hide();
                }
            }
        });
    });
});


// Đóng sidebar khi nhấp ra ngoài trên màn hình nhỏ
document.addEventListener('click', function(event) {
    if (!event.target.closest('.sidebar') && !event.target.closest('.toggle-sidebar-btn') && sidebar && sidebar.classList.contains('show') && window.innerWidth < 768) {
        sidebar.classList.remove('show');
        content.classList.remove('shifted');
    }
});
