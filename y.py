import sys

d = {}
for line in sys.stdin:
  try: a, b, c = line.strip().split()
  except: sys.stderr.write(line)
  if a not in d: d[a] = 0
  if b not in d: d[b] = 0

for k in d.iterkeys():
  print k
