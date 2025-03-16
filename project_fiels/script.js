function showSection(sectionId) {
    const container = document.getElementById("attendance-container");
    const sections = {
        "it_a": `
                    <h2>BSIT - 2A - IT ELECTIVE</h2>
                    <h3>March 15, 2025</h3>
                    <table>
                        <tr><th>School ID</th><th>Name</th><th>Attendance Status</th></tr>
                        <tr><td>202300001</td><td>John Doe</td><td>Present</td></tr>
                        <tr><td>202300002</td><td>Jane Smith</td><td>Present</td></tr>
                        <tr><td>202300003</td><td>Michael Johnson</td><td>Present</td></tr>
                        <tr><td>202300004</td><td>Emily Brown</td><td>Present</td></tr>
                        <tr><td>202300005</td><td>Daniel White</td><td>Absent</td></tr>
                    </table>`
        ,
        "it_b": `
                    <h2>BSIT - 2B - IT ELECTIVE</h2>
                    <h3>March 15, 2025</h3>

                    <table>
                        <tr><th>School ID</th><th>Name</th><th>Attendance Status</th></tr>
                        <tr><td>202300001</td><td>John Doe</td><td>Present</td></tr>
                        <tr><td>202300002</td><td>Jane Smith</td><td>Present</td></tr>
                        <tr><td>202300003</td><td>Michael Johnson</td><td>Present</td></tr>
                        <tr><td>202300004</td><td>Emily Brown</td><td>Present</td></tr>
                        <tr><td>202300005</td><td>Daniel White</td><td>Absent</td></tr>
                    </table>`
        ,
        "it_c": `
                    <h2>BSIT - 2C - IT ELECTIVE</h2>
                    <h3>March 15, 2025</h3>
                    <table>
                        <tr><th>School ID</th><th>Name</th><th>Attendance Status</th></tr>
                        <tr><td>202300001</td><td>John Doe</td><td>Present</td></tr>
                        <tr><td>202300002</td><td>Jane Smith</td><td>Present</td></tr>
                        <tr><td>202300003</td><td>Michael Johnson</td><td>Present</td></tr>
                        <tr><td>202300004</td><td>Emily Brown</td><td>Present</td></tr>
                        <tr><td>202300005</td><td>Daniel White</td><td>Absent</td></tr>
                    </table>`
        ,
        "db_a": `<h2>BSIT - 2A - Advanced Database</h2><p>Attendance data here...</p>`,
        "db_b": `<h2>BSIT - 2B - Advanced Database</h2><p>Attendance data here...</p>`,
        "db_c": `<h2>BSIT - 2C - Advanced Database</h2><p>Attendance data here...</p>`
    };
    container.innerHTML = sections[sectionId] || "<h2>No data available</h2>";
}
function toggleSections(subject) {
    const section = document.getElementById(subject + "-sections");
    section.style.display = section.style.display === "none" ? "block" : "none";
}