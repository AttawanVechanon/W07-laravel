<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไข บุคลากร</title>
</head>
<body>
    <h1>แก้ไขข้อมูล บุคลากร (ID: {{ $item->id }})</h1>

    <form action="/staff/update/{{ $item->id }}" method="POST">
        @csrf
        <p>
            <label>คำนำหน้าชื่อ:</label>
            <select name="title_id" required>
                @foreach($titles as $t)
                    <option value="{{ $t->id }}" {{ $item->title_id == $t->id ? 'selected' : '' }}>
                        {{ $t->title_name }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label>ชื่อ-นามสกุล:</label>
            <input type="text" name="name" value="{{ $item->name }}" required>
        </p>

        <p>
            <label>ตำแหน่ง:</label>
            <input type="text" name="position" value="{{ $item->position }}" required>
        </p>

        <p>
            <label>หน่วยงาน/องค์กร:</label>
            <select name="organization_id" required>
                @foreach($organizations as $org)
                    <option value="{{ $org->id }}" {{ $item->organization_id == $org->id ? 'selected' : '' }}>
                        {{ $org->name }}
                    </option>
                @endforeach
            </select>
        </p>

        <button type="submit">อัปเดตข้อมูล</button>
        <a href="/staff">ยกเลิก</a>
    </form>
</body>
</html>