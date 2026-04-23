<!DOCTYPE html>
<html>
<head>
    <title>CRUD User Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">CRUD User</h2>

    <!-- FORM TAMBAH -->
    <div class="card mb-4">
        <div class="card-header">Tambah User</div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <input type="text" id="name" class="form-control" placeholder="Nama">
                </div>
                <div class="col">
                    <input type="email" id="email" class="form-control" placeholder="Email">
                </div>
                <div class="col">
                    <input type="password" id="password" class="form-control" placeholder="Password">
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary" onclick="addUser()">Tambah</button>
                </div>
            </div>
        </div>
    </div>

    <!-- SEARCH & INFO -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center gap-2">
            <span class="text-muted small">Tampilkan</span>
            <select id="perPage" class="form-select form-select-sm" style="width:80px" onchange="changePerPage()">
                <option value="5">5</option>
                <option value="10" selected>10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
            <span class="text-muted small">data</span>
        </div>
        <div class="input-group" style="max-width: 260px;">
            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398l3.85 3.85a1 1 0 0 0 1.415-1.415l-3.868-3.833zm-5.242 1.406a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11z"/></svg></span>
            <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="Cari nama atau email..." oninput="onSearch()">
        </div>
    </div>

    <!-- TABEL USER -->
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead class="table-dark">
                    <tr>
                        <th style="width:60px">ID</th>
                        <th class="sortable" onclick="sortBy('name')" style="cursor:pointer">
                            Nama <span id="sort-name">↕</span>
                        </th>
                        <th class="sortable" onclick="sortBy('email')" style="cursor:pointer">
                            Email <span id="sort-email">↕</span>
                        </th>
                        <th style="width:160px">Aksi</th>
                    </tr>
                </thead>
                <tbody id="userTable">
                    <tr><td colspan="4" class="text-center text-muted py-3">Memuat data...</td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- PAGINATION -->
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div class="text-muted small" id="paginationInfo">-</div>
        <nav>
            <ul class="pagination pagination-sm mb-0" id="paginationLinks"></ul>
        </nav>
    </div>
</div>

<!-- MODAL EDIT -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" id="editId">
                <input type="text" id="editName" class="form-control mb-2" placeholder="Nama">
                <input type="email" id="editEmail" class="form-control mb-2" placeholder="Email">
                <input type="password" id="editPassword" class="form-control" placeholder="Password baru (opsional)">
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary" onclick="updateUser()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
const API_URL = "http://127.0.0.1:8000/api/users";

let allUsers = [];
let currentPage = 1;
let perPage = 10;
let searchQuery = "";
let sortColumn = "";
let sortDir = "asc";
let searchTimer = null;

// READ - ambil semua data dari API
function getUsers() {
    fetch(API_URL)
        .then(res => res.json())
        .then(data => {
            allUsers = data;
            currentPage = 1;
            renderTable();
        })
        .catch(() => {
            document.getElementById("userTable").innerHTML =
                '<tr><td colspan="4" class="text-center text-danger">Gagal memuat data.</td></tr>';
        });
}

// Proses data: filter, sort, paginate
function getProcessedData() {
    let data = [...allUsers];

    // Filter search
    if (searchQuery) {
        const q = searchQuery.toLowerCase();
        data = data.filter(u =>
            u.name.toLowerCase().includes(q) ||
            u.email.toLowerCase().includes(q)
        );
    }

    // Sort
    if (sortColumn) {
        data.sort((a, b) => {
            const valA = (a[sortColumn] || "").toLowerCase();
            const valB = (b[sortColumn] || "").toLowerCase();
            if (valA < valB) return sortDir === "asc" ? -1 : 1;
            if (valA > valB) return sortDir === "asc" ? 1 : -1;
            return 0;
        });
    }

    return data;
}

// Render tabel
function renderTable() {
    const processed = getProcessedData();
    const total = processed.length;
    const totalPages = Math.ceil(total / perPage) || 1;

    if (currentPage > totalPages) currentPage = totalPages;

    const start = (currentPage - 1) * perPage;
    const end = start + perPage;
    const pageData = processed.slice(start, end);

    if (pageData.length === 0) {
        document.getElementById("userTable").innerHTML =
            '<tr><td colspan="4" class="text-center text-muted py-3">Tidak ada data ditemukan.</td></tr>';
    } else {
        document.getElementById("userTable").innerHTML = pageData.map(user => `
            <tr>
                <td>${user.id}</td>
                <td>${escapeHtml(user.name)}</td>
                <td>${escapeHtml(user.email)}</td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick="openEdit(${user.id}, '${escapeAttr(user.name)}', '${escapeAttr(user.email)}')">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteUser(${user.id})">Hapus</button>
                </td>
            </tr>
        `).join("");
    }

    // Info pagination
    const from = total === 0 ? 0 : start + 1;
    const to = Math.min(end, total);
    document.getElementById("paginationInfo").textContent =
        `Menampilkan ${from}–${to} dari ${total} data`;

    // Render pagination links
    renderPagination(totalPages);
}

function renderPagination(totalPages) {
    const ul = document.getElementById("paginationLinks");
    let html = "";

    html += `<li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
        <a class="page-link" href="#" onclick="goPage(${currentPage - 1});return false">Previous</a>
    </li>`;

    // Tampilkan max 5 halaman
    let startP = Math.max(1, currentPage - 2);
    let endP = Math.min(totalPages, startP + 4);
    if (endP - startP < 4) startP = Math.max(1, endP - 4);

    for (let i = startP; i <= endP; i++) {
        html += `<li class="page-item ${i === currentPage ? 'active' : ''}">
            <a class="page-link" href="#" onclick="goPage(${i});return false">${i}</a>
        </li>`;
    }

    html += `<li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
        <a class="page-link" href="#" onclick="goPage(${currentPage + 1});return false">Next</a>
    </li>`;

    ul.innerHTML = html;
}

function goPage(page) {
    const processed = getProcessedData();
    const totalPages = Math.ceil(processed.length / perPage) || 1;
    if (page < 1 || page > totalPages) return;
    currentPage = page;
    renderTable();
}

function changePerPage() {
    perPage = parseInt(document.getElementById("perPage").value);
    currentPage = 1;
    renderTable();
}

function onSearch() {
    clearTimeout(searchTimer);
    searchTimer = setTimeout(() => {
        searchQuery = document.getElementById("searchInput").value.trim();
        currentPage = 1;
        renderTable();
    }, 300);
}

function sortBy(column) {
    if (sortColumn === column) {
        sortDir = sortDir === "asc" ? "desc" : "asc";
    } else {
        sortColumn = column;
        sortDir = "asc";
    }

    // Update ikon sort
    ["name", "email"].forEach(col => {
        const el = document.getElementById("sort-" + col);
        if (el) el.textContent = "↕";
    });
    const activeEl = document.getElementById("sort-" + column);
    if (activeEl) activeEl.textContent = sortDir === "asc" ? "↑" : "↓";

    renderTable();
}

// CREATE
function addUser() {
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    if (!name || !email || !password) {
        alert("Semua field wajib diisi!");
        return;
    }

    fetch(API_URL, {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({ name, email, password })
    }).then(() => {
        document.getElementById("name").value = "";
        document.getElementById("email").value = "";
        document.getElementById("password").value = "";
        getUsers();
    });
}

// DELETE
function deleteUser(id) {
    if (confirm("Yakin hapus data?")) {
        fetch(`${API_URL}/${id}`, { method: "DELETE" })
            .then(() => getUsers());
    }
}

// OPEN MODAL EDIT
function openEdit(id, name, email) {
    document.getElementById("editId").value = id;
    document.getElementById("editName").value = name;
    document.getElementById("editEmail").value = email;
    document.getElementById("editPassword").value = "";
    new bootstrap.Modal(document.getElementById('editModal')).show();
}

// UPDATE
function updateUser() {
    const id = document.getElementById("editId").value;
    const name = document.getElementById("editName").value;
    const email = document.getElementById("editEmail").value;
    const password = document.getElementById("editPassword").value;

    const body = { name, email };
    if (password) body.password = password;

    fetch(`${API_URL}/${id}`, {
        method: "PUT",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(body)
    }).then(() => {
        bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
        getUsers();
    });
}

// Helper: escape HTML untuk keamanan
function escapeHtml(str) {
    return String(str)
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;");
}

function escapeAttr(str) {
    return String(str).replace(/'/g, "\\'");
}

// Load data awal
getUsers();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>