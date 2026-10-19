<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>จัดการ บุคลากร (Staff - Relational)</title>
</head>
<body>
    <h1>จัดการข้อมูล บุคลากร (Staff)</h1>

    <!-- 🟢 ฟอร์มเพิ่มข้อมูล -->
    <h3>+ เพิ่มบุคลากรใหม่</h3>
    <form action="/staff/store" method="POST">
        @csrf

        <!-- Dropdown คำนำหน้าชื่อ -->
        <label>คำนำหน้าชื่อ:</label>
        <select name="title_id" required>
            <option value="">-- เลือกคำนำหน้า --</option>
            @foreach($titles as $t)
                <option value="{{ $t->id }}">{{ $t->title_name }}</option>
            @endforeach
        </select>

        <label>ชื่อ-นามสกุล:</label>
        <input type="text" name="name" placeholder="กรอกชื่อ-นามสกุล" required>
        
        <label>ตำแหน่ง:</label>
        <input type="text" name="position" placeholder="กรอกตำแหน่ง" required>

        <!-- Dropdown หน่วยงาน -->
        <label>หน่วยงาน/องค์กร:</label>
        <select name="organization_id" required>
            <option value="">-- เลือกหน่วยงาน --</option>
            @foreach($organizations as $org)
                <option value="{{ $org->id }}">{{ $org->name }}</option>
            @endforeach
        </select>

        <button type="submit">บันทึกข้อมูล</button>
    </form>

    <br><hr><br>

    <!-- 🔵 ตารางแสดงข้อมูล -->
    <h3>รายการบุคลากรทั้งหมด</h3>
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>คำนำหน้า</th>
                <th>ชื่อ-นามสกุล</th>
                <th>ตำแหน่ง</th>
                <th>หน่วยงาน</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <!-- ดึงข้อมูลข้ามตารางผ่าน Relationship -->
                <td>{{ $item->title->title_name ?? '-' }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->position }}</td>
                <td>{{ $item->organization->name ?? '-' }}</td>
                <td>
                    <a href="/staff/edit/{{ $item->id }}">แก้ไข</a> 
                    | 
                    <a href="/staff/delete/{{ $item->id }}" onclick="return confirm('คุณแน่ใจหรือไม่ที่จะลบรายการนี้?')">ลบ</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>