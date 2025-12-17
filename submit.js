// api/submit.js
import fetch from 'node-fetch';

export default async function handler(req, res) {
  if (req.method !== 'POST') return res.status(405).send('Method Not Allowed');

  const secret = process.env.PROXY_SECRET;
  if (!secret || req.headers['x-server-secret'] !== secret) {
    return res.status(401).send('Unauthorized');
  }

  const payload = req.body;
  if (!payload || (!payload.email) || (!payload.surname && !payload.given_name)) {
    return res.status(400).send('Missing required fields');
  }

  const url = `${process.env.SUPABASE_URL.replace(/\/$/, '')}/rest/v1/${process.env.SUPABASE_TABLE}`;
  const key = process.env.SUPABASE_SERVICE_ROLE;
  if (!process.env.SUPABASE_URL || !key || !process.env.SUPABASE_TABLE) {
    return res.status(500).send('Server misconfiguration');
  }

  try {
    const r = await fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'apikey': key,
        'Authorization': `Bearer ${key}`,
        'Prefer': 'return=representation'
      },
      body: JSON.stringify([payload])
    });
    const text = await r.text();
    if (!r.ok) return res.status(502).send(`Upstream error: ${r.status} ${text}`);
    res.status(200).send(text);
  } catch (err) {
    console.error(err);
    res.status(502).send('Proxy error');
  }
}
