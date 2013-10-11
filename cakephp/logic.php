<?php

echo <<< 'EOD'

<?php
echo <<< 'EOD'
package c.soshik;<br>
<br>
import java.util.Map;<br>
<br>
public class MainDriver {<br>
	public static void main(String[] args) {<br>
		Map bmap = convmap(new String[][]{<br>
				new String[]{"10100000","ああああ　いいいい　ううううう　（感じ）"},<br>
				new String[]{"10100001","あああ　いいい　ううううう　（感uじ）"},<br>
				new String[]{"10100002","ああああ　いいいい　ううううう　（感じ1）"},<br>
				new String[]{"10100011","ああああ　いいいい　ううう12うう　（感じ12）"},<br>
				new String[]{"10100003","あああ　いいいい　うううう　（感じ）"},<br>
				new String[]{"10100004","ああ　いいいい　ううううう　（感じ）"},<br>
		});<br>
		System.out.println();<br>
		System.out.println();<br>
		for(Object key : bmap.keySet()){<br>
			SoshikDTO dto = (SoshikDTO)bmap.get(key);<br>
			System.out.println("¥t 1: "+key+", "+dto.getCd());<br>
			Map map = dto.getData();<br>
			if(null != map)for(Object key2 : map.keySet()){<br>
				SoshikDTO dto2 = (SoshikDTO)map.get(key2);<br>
				System.out.println("¥t¥t 2: "+key2+", "+dto2.getCd());<br>
				Map map2 = dto2.getData();<br>
				if(null != map2)for(Object key3 : map2.keySet()){<br>
					SoshikDTO dto3 = (SoshikDTO)map2.get(key3);<br>
					System.out.println("¥t¥t¥t 3: "+key3+", "+dto3.getCd());<br>
					Map map3 = dto3.getData();<br>
					if(null != map3)for(Object key4 : map3.keySet()){<br>
						SoshikDTO dto4 = (SoshikDTO)map3.get(key4);<br>
						System.out.println("¥t¥t¥t¥t 4: "+key4+", "+dto4.getCd());<br>
					}<br>
				}<br>
			}<br>
		}<br>
		<br>
	}<br>
	<br>
	public static Map convmap(String[][] table){<br>
		java.util.Map soshiknmNewCdMap = new java.util.LinkedHashMap();<br>
		java.util.Map oldAndNewCdmap = new java.util.LinkedHashMap();<br>
		java.util.Map map = new java.util.LinkedHashMap();<br>
		for(String[] recordset : table){<br>
			String oldcd = recordset[0];<br>
			String soshiknmdata = recordset[1];<br>
			String [] record = soshiknmdata.split("　"); // AAA　あああ　いいい　（ううう）　：４階層<br>
			// 4階層のループ 各階層に自身のキーが存在するかを確認し、最終的なカウントを求める。<br>
			// 各階層はマップで表現<br>
			//  マップに自身のキー（階層名）が存在した場合、カウントアップはせずに存在した位置のカウントを返却する。<br>
			//  マップに自身のキー（階層名）が存在しない場合、その階層部分のみカウントアップし、下の階層の確認も行う（この場合新規なので、階層があればカウントは上がる）<br>
			String newsoshikcd = convsoshik(0, record, map);<br>
			soshiknmNewCdMap.put(soshiknmdata, newsoshikcd/*新コード*/); // ファイルA<br>
			oldAndNewCdmap.put(oldcd, newsoshikcd);<br>
		}<br>
//		for(Object key : soshiknmNewCdMap.keySet()){<br>
//			System.out.println("1 key:"+key+", value="+map.get(key));<br>
//		}<br>
//		for(Object key : oldAndNewCdmap.keySet()){<br>
//			System.out.println("2 key:"+key+", value="+map.get(key));<br>
//		}<br>
//		for(Object key : map.keySet()){<br>
//			System.out.println("3 key:"+key+", value="+(null == map.get(key) ? "ない" : ((SoshikDTO)map.get(key)).getCd()));<br>
//		}<br>
		return map;<br>
	}<br>
	<br>
	private static String convsoshik(int idx, String[] record, Map map) {<br>
		final int originalidx = idx;<br>
		if(null == map || record.length == idx) return null;<br>
		int cnt1 = 10;<br>
		Object obj = map.get(record[idx]);<br>
		SoshikDTO dto = null;<br>
		if(null == obj){<br>
			obj = new MainDriver().new SoshikDTO();<br>
			map.put(record[idx], obj);<br>
			cnt1 = cnt1 + map.keySet().size() -1;<br>
			dto = (SoshikDTO)obj;<br>
			dto.setCd(String.valueOf(cnt1));<br>
			dto.setData(new java.util.LinkedHashMap());<br>
		}else{<br>
			dto = (SoshikDTO)obj;<br>
			cnt1 = Integer.parseInt(dto.getCd());<br>
		}<br>
		String cd = convsoshik(idx + 1, record, dto.getData());<br>
		String ret = null == cd ? dto.getCd() : dto.getCd() + cd;<br>
		System.out.println("¥t ["+ret+"]¥t >> "+originalidx+"¥t : "+record[originalidx]+"¥t : "+dto.getCd());<br>
<br>
		return ret;<br>
	}<br>
	class SoshikDTO{<br>
		String cd = null;<br>
		java.util.Map data = null;<br>
		public String getCd() {<br>
			return cd;<br>
		}<br>
		public void setCd(String cd) {<br>
			this.cd = cd;<br>
		}<br>
		public java.util.Map getData() {<br>
			return data;<br>
		}<br>
		public void setData(java.util.Map data) {<br>
			this.data = data;<br>
		}<br>
	}<br>
}<br>

EOD;

?>


EOD;
?>
